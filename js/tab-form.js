jQuery(document).ready(function($) {
    $('#firstForm').submit(function(e) {
        e.preventDefault();
        let count = $("#firstForm .popupCheckbox:checked");
        if (count.length > 0) {
            $('.firstFormError').html('');
            nextPrev(1);
        } else {
            $('.firstFormError').html('Please select at least one option from list above');
        }
    });
    $('#secondForm').submit(function(e) {
        e.preventDefault();
        let count = $("#secondForm .popupCheckbox:checked");
        if (count.length > 0) {
            $('.secondFormError').html('');
            nextPrev(1);
        } else {
            $('.secondFormError').html('Please select at least one option from list above');
        }
    });
    $('#thirdForm').submit(function(e) {
        e.preventDefault();
        let count = $("#thirdForm .popupCheckbox:checked");
        if (count.length > 0) {
            $('.thirdFormError').html('');
            nextPrev(1);
        } else {
            $('.thirdFormError').html('Please select at least one option from list above');
        }
    }); 
});

var currentTab = 0;
showTab(currentTab);

function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
}

function nextPrev(n) {
    var x = document.getElementsByClassName("tab");
    x[currentTab].style.display = "none";
    currentTab = currentTab + n; 
    if (n != 6)
        showTab(currentTab);
} 