// List states on the basis of country.
function listState(val) {
  prepareOutput('country_id', val, 'state-div', 'state-list', 'city-div');
}

// List city on the basis of states.
function listCity(val) {
  prepareOutput('state_id', val, 'city-div', 'city-list');
}

// List classes on the basis of schools.
function listClasses(val) {
  prepareOutput('school_id', val, 'class-div', 'class-list', 'subjects-div');
}

// List subject on the basis of classes.
function listSubjects(val) {
  prepareOutput('class_id', val, 'subjects-div', 'subjects-list');
}

// Prepare final output.
function prepareOutput(name, val, arg1, arg2, arg3 = '') {
  $.ajax({
    type: 'POST',
    url: './assets/js/ajax/ajaxHandler.php',
    data: name + '=' + val,
    success: function (data) {
      if (data) {
        $('#' + arg1).removeClass('d-none');
        $('#' + arg2).html(data);
      }
      if (arg3 != '') {
        $('#' + arg3).addClass('d-none')
      }
    }
  });
}