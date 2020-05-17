$(function() {
    dynamicDropdown("/api/categories", "#category_id");

    $("#category_id").change(function() {
        let url = `/api/subcategories/${this.value}`;
        let target = "#subcategory_id";
        dynamicDropdown(url, target);
    });
});

function dynamicDropdown(url, selector) {
    $.get(url, function(data) {
        let $select = $(selector);
        $select
            .find("option")
            .not(":first")
            .remove();
        let options = [];
        $.each(data, function(index, item) {
            options.push(`<option value="${item.id}">${item.name}</option>`);
        });

        $select.append(options);
    });
}
