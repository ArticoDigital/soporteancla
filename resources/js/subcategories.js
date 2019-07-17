const subCategoriesEl = document.querySelector('#service_subcategory'),
    categoriesEl = document.querySelector('#service_category_id'),
    type_category = document.querySelector('#type_category')
;
let categoriesJson = {};

export default function () {
    if (categoriesEl) {

        categoriesJson = JSON.parse(categoriesEl.dataset.json);

        if (categoriesEl.value !== '') {
            change()
        }
        categoriesEl.addEventListener('change', change)
    }
}

function change() {
    const oldSubCategories = subCategoriesEl.dataset.old;
    let categoryId = categoriesEl.options[categoriesEl.selectedIndex].value;
    if (categoryId) {
        const c = categoriesJson.find((c) => c.id === parseInt(categoryId));
        subCategoriesEl.disabled = false;
        subCategoriesEl.options.length = 0;
        c.subcategories.forEach(function (el) {
            let option = document.createElement("option");
            option.text = el.name;
            option.value = el.id;
            if (+oldSubCategories === el.id) {
                option.selected = true;
                subCategoriesEl.dataset.old = '';
                console.log(oldSubCategories)
            }
            subCategoriesEl.add(option);

        });

        if (parseInt(categoryId) === 1) {
            console.log(type_category)
            type_category.classList.remove('is-hidden')
        } else {
            console.log(categoryId)
            type_category.classList.add('is-hidden')
        }

    } else {
        subCategoriesEl.disabled = true;
    }

}
