const subCategoriesEl = document.querySelector('#service_subcategory'),
  categoriesEl = document.querySelector('#service_category_id');
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
  } else {
    subCategoriesEl.disabled = true;
  }
  
}