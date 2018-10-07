const subCategoriesEl = document.querySelector('#service_subcategory'),
    categoriesEl = document.querySelector('#service_category_id');

export default function () {
    if (categoriesEl) {

        let categoriesJson = JSON.parse(categoriesEl.dataset.json);

        categoriesEl.addEventListener('change', function (e) {

            let categoryId = categoriesEl.options[categoriesEl.selectedIndex].value;
            if (categoryId) {
                const c = categoriesJson.find((c) => c.id === parseInt(categoryId));
                subCategoriesEl.disabled = false;
                subCategoriesEl.options.length = 0;
                c.subcategories.forEach(function (el) {
                    let option = document.createElement("option");
                    option.text = el.name;
                    option.value = el.id;
                    subCategoriesEl.add(option);

                });
            } else {
                subCategoriesEl.disabled = true;
            }

        })
    }
}