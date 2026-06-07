import fitz
import json
import os

pdf_path = r"C:\Users\practi\Documents\Pagina_IMGEESSA\public\documentos\Catalogo Industrial 2025.pdf"

categories = {
    (2, 18): "proteccion_contra_caidas_y_espacios_confinados",
    (19, 23): "proteccion_craneal",
    (24, 27): "proteccion_ocular",
    (28, 35): "proteccion_respiratoria",
    (36, 38): "proteccion_auditiva",
    (39, 44): "proteccion_para_manos",
    (45, 47): "proteccion_facial",
    (48, 50): "proteccion_corporal",
    (51, 53): "proteccion_para_pies",
    (54, 55): "deteccion_de_gases_y_medicion",
    (56, 60): "senalizacion",
    (61, 64): "bloqueo_y_etiquetado",
    (65, 65): "prehospitalario_y_emergencias",
    (66, 66): "contraincendios_y_derrames",
    (67, 67): "izaje_para_cargas",
    (68, 68): "residuos_y_desechos",
    (69, 71): "maquinaria_y_ferreteria",
}

def get_category_for_page(page_num):
    for (start, end), cat in categories.items():
        if start <= page_num <= end:
            return cat
    return "otros"

doc = fitz.open(pdf_path)
data = {}

for i in range(len(doc)):
    cat = get_category_for_page(i)
    if cat not in data:
        data[cat] = []
        
    page = doc[i]
    text = page.get_text("text").strip()
    if text:
        data[cat].append({
            "pagina": i + 1,
            "texto_extraido": text
        })

output_path = r"C:\Users\practi\Documents\Pagina_IMGEESSA\public\img\catalogo\textos_por_categoria.json"
with open(output_path, "w", encoding="utf-8") as f:
    json.dump(data, f, ensure_ascii=False, indent=4)

print(f"Textos guardados en {output_path}")
