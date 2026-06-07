<?php

$jsonPath = 'c:\Users\practi\Documents\Pagina_IMGEESSA\public\img\catalogo\textos_por_categoria.json';
$data = json_decode(file_get_contents($jsonPath), true);
$productos = [];
$skipLines = ['www.imgeessa.com.co', '3209738073 - 3107696821', '@IMGEESSA SAS', 'Imgeessa SAS', 'imgeessasolucioneshseq@gmail.com'];
$idCounter = 1;

foreach ($data as $catKey => $pages) {
    if ($catKey === 'otros') continue;
    $categoriaNombre = ucwords(str_replace('_', ' ', $catKey));
    $catDir = 'c:\Users\practi\Documents\Pagina_IMGEESSA\public\img\catalogo\\' . $catKey;
    
    foreach ($pages as $page) {
        $pageNum = $page['pagina'];
        $lines = explode("\n", $page['texto_extraido']);
        $parsedProducts = [];
        $currentTitle = "";
        $currentDesc = "";
        
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) continue;
            if (in_array($line, $skipLines)) continue;
            // Skip category headers
            if (stripos($catKey, 'proteccion') !== false && stripos($line, 'PROTECCI') !== false) continue;
            if (stripos($line, 'ESPACIOS CONFINADOS') !== false && empty($currentTitle)) continue;
            
            // A title line is uppercase and has some letters
            $isUpper = (strtoupper($line) === $line) && preg_match('/[A-Z]/', $line);
            
            if ($isUpper) {
                if ($currentDesc !== "") {
                    // Save previous product
                    $parsedProducts[] = ['nombre' => trim($currentTitle), 'descripcion' => trim($currentDesc)];
                    $currentTitle = $line;
                    $currentDesc = "";
                } else {
                    $currentTitle .= ($currentTitle === "" ? "" : " ") . $line;
                }
            } else {
                $currentDesc .= ($currentDesc === "" ? "" : " ") . $line;
            }
        }
        if ($currentTitle !== "") {
            $parsedProducts[] = ['nombre' => trim($currentTitle), 'descripcion' => trim($currentDesc)];
        }
        
        // Match with images
        $images = [];
        if (is_dir($catDir)) {
            $files = scandir($catDir);
            foreach ($files as $file) {
                if (preg_match('/^page_' . $pageNum . '_img_(\d+)\.(png|jpg|jpeg)$/i', $file, $matches)) {
                    $images[$matches[1]] = $file;
                }
            }
        }
        ksort($images);
        
        $imgFiles = array_values($images);
        $numImgs = count($imgFiles);
        $numProds = count($parsedProducts);
        
        // If there are exactly as many parsed products as images, pair them up
        if ($numImgs > 0) {
            for ($i = 0; $i < $numImgs; $i++) {
                $prodName = isset($parsedProducts[$i]) && !empty($parsedProducts[$i]['nombre']) ? $parsedProducts[$i]['nombre'] : $categoriaNombre . ' - Producto ' . ($i+1);
                $prodDesc = isset($parsedProducts[$i]) && !empty($parsedProducts[$i]['descripcion']) ? $parsedProducts[$i]['descripcion'] : 'Consulte para más detalles.';
                
                $productos[] = [
                    'id' => $idCounter++,
                    'nombre' => $prodName,
                    'categoria' => $categoriaNombre,
                    'precio' => 'Consultar',
                    'descripcion' => $prodDesc,
                    'imagen' => 'img/catalogo/' . $catKey . '/' . $imgFiles[$i],
                    'especificaciones' => [],
                    'destacado' => false
                ];
            }
        }
    }
}

file_put_contents('c:\Users\practi\Documents\Pagina_IMGEESSA\public\img\catalogo\productos_parsed.json', json_encode($productos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "Generados " . count($productos) . " productos.\n";
