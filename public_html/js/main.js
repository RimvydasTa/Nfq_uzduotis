document.addEventListener("DOMContentLoaded", function() {

    var orderForm = document.getElementById("order-show-form");
    var sortInp = document.querySelector(".sort-inp");
    var sortByInp = document.querySelector(".sortBy-inp");
    var page = document.querySelector(".page");

    var submitLink = document.querySelectorAll(".submit-link");

    for (var i = 0; i < submitLink.length; i++) {
        result = submitLink[i];
        result.addEventListener('click', function() {

           sortByInp.value =  this.dataset.sortby;

           sortInp.value = this.dataset.sort;
           page.value = this.dataset.page ;
           orderForm.submit();
        });
    }
    var paginationLink = document.querySelectorAll(".pagination-link");

    for (var i = 0; i < paginationLink.length; i++) {
        result = paginationLink[i];
        result.addEventListener('click', function() {

            page.value = this.dataset.page ;
            orderForm.submit();
        });
    }

});


