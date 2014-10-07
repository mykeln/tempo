
//// UTILITY FUNCTIONS
function compareNum(a, b){
  return (a < b ? this >= a && this <= b : this >= b && this <= a);
}

function roundNum(num, nearest) {
  return (Math.round(num / nearest) * nearest);
}

function eval_fragment(formula_text, lookup_table) {
  var formula = formula_text.match(/\(\[(.*?)\]\*([0-9|.]+)\)/i);
  var coefficient_key = formula[1];
  var number = parseFloat(formula[2]);


  var coefficient = lookup_table[coefficient_key];
  //console.log(coefficient * number);

  var exactTarget = (coefficient * number);
  var roundedTarget = roundNum(exactTarget,5);

  return(roundedTarget);
}

function eval_target(input_string) {
    // first match formulas ([?]*?)
    var formulas = input_string.match(/\(\[(.*?)\]\*([0-9|.]+)\)/ig);

    // evaluate individual fragments
    var replace = [];
    for( i = 0; i < formulas.length; i++ ) {
        replace.push({
            "from": formulas[i],
            "to": eval_fragment(formulas[i], powerProfile)
        });
    }

    // do search-replace on the text
    for( i = 0; i < replace.length; i++ ) {
        input_string = input_string.replace(
            replace[i].from,
            Math.round(replace[i].to)
        );
    }

    return(input_string );
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

function scrollToSelectedItem() {
  $('html,body').animate({scrollTop:$(location.hash).offset().top}, 500);
}

jQuery(function($) {
  // form validation

  $('#signup_form').bootstrapValidator({
    excluded: [':disabled', ':hidden', ':not(:visible)'],
    message: 'This value is wrong',
    trigger: null,
    fields: {
      inputName: {
        validators: {
          notEmpty: {
            message: 'We should at least know what to call you'
          }
        }
      },
      inputEmail: {
        validators: {
          notEmpty: {
            message: 'We need your email address to create a unique account'
          }
        }
      },
      inputPassword: {
        validators: {
          notEmpty: {
            message: 'You need a password to log back in'
          }
        }
      },
      inputWeight: {
        validators: {
          digits: {
            message: 'This should be a number only'
          },
          notEmpty: {
            message: 'We need your weight to calculate your power profile'
          }
        }
      },
      input5s: {
        validators: {
          digits: {
            message: 'This should be a number only'
          },
          notEmpty: {
            message: 'We need this to calculate your power profile'
          }
        }
      },
      input1m: {
        validators: {
          digits: {
            message: 'This should be a number only'
          },
          notEmpty: {
            message: 'We need this to calculate your power profile'
          }
        }
      },
      input5m: {
        validators: {
          digits: {
            message: 'This should be a number only'
          },
          notEmpty: {
            message: 'We need this to calculate your power profile'
          }
        }
      },
      input20m: {
        validators: {
          digits: {
            message: 'This should be a number only'
          },
          notEmpty: {
            message: 'We need this to calculate your power profile'
          }
        }
      },
    }

  });
});