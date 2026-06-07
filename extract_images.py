import fitz # PyMuPDF
import os

pdf_path = r"C:\Users\practi\Documents\Pagina_IMGEESSA\public\documentos\Catalogo Industrial 2025.pdf"
base_dir = r"C:\Users\practi\Documents\Pagina_IMGEESSA\public\img\catalogo"

# Mapeo de páginas a categorías (Páginas son base 0 en PyMuPDF)
# La página 3 del PDF es el índice 2 en PyMuPDF
categories = {
    (2, 18): "proteccion_contra_caidas_y_espacios_confinados", # pages 3-19
    (19, 23): "proteccion_craneal", # pages 20-24
    (24, 27): "proteccion_ocular", # pages 25-28
    (28, 35): "proteccion_respiratoria", # pages 29-36
    (36, 38): "proteccion_auditiva", # pages 37-39
    (39, 44): "proteccion_para_manos", # pages 40-45
    (45, 47): "proteccion_facial", # pages 46-48
    (48, 50): "proteccion_corporal", # pages 49-51
    (51, 53): "proteccion_para_pies", # pages 52-54
    (54, 55): "deteccion_de_gases_y_medicion", # pages 55-56
    (56, 60): "senalizacion", # pages 57-61
    (61, 64): "bloqueo_y_etiquetado", # pages 62-65
    (65, 65): "prehospitalario_y_emergencias", # pages 66
    (66, 66): "contraincendios_y_derrames", # pages 67
    (67, 67): "izaje_para_cargas", # pages 68
    (68, 68): "residuos_y_desechos", # pages 69
    (69, 71): "maquinaria_y_ferreteria", # pages 70-72
}

def get_category_for_page(page_num):
    for (start, end), cat in categories.items():
        if start <= page_num <= end:
            return cat
    return None

doc = fitz.open(pdf_path)

for i in range(len(doc)):
    cat = get_category_for_page(i)
    if not cat:
        continue
        
    out_dir = os.path.join(base_dir, cat)
    if not os.path.exists(out_dir):
        os.makedirs(out_dir)
        
    page = doc[i]
    images = page.get_images(full=True)
    for img_idx, img in enumerate(images):
        xref = img[0]
        base_image = doc.extract_image(xref)
        image_bytes = base_image["image"]
        image_ext = base_image["ext"]
        
        # Ignorar logos o iconos pequeños (menos de 5KB)
        if len(image_bytes) < 5000:
            continue
            
        img_name = f"page_{i+1}_img_{img_idx+1}.{image_ext}"
        img_path = os.path.join(out_dir, img_name)
        
        with open(img_path, "wb") as f:
            f.write(image_bytes)

print("Extracción de imágenes completada y categorizada con éxito.")
