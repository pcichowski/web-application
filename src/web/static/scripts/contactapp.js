var inputs = document.getElementsByClassName('formularz')[0].getElementsByTagName('input');
var textareas = document.getElementsByTagName('textarea');

function loadform(){
    for(let i = 0; i < inputs.length - 2; i++){
      if(i != 2 && i != 3){
          inputs[i].value = sessionStorage.getItem('inputs' + i);
      }
    }
    inputs[2].checked = !!sessionStorage.getItem('radio0');
    inputs[3].checked = !!sessionStorage.getItem('radio1');
  
    textareas[0].value = sessionStorage.getItem('textarea');
}

loadform();

function focusoutform(){
    
  
    for(let i = 0; i < inputs.length; i++){
        inputs[i].addEventListener('focusout', saveform);
    }

    textareas[0].addEventListener('focusout', saveform);
}

function saveform(){
    for(let i = 0; i <inputs.length - 2; i++){
        if(i != 2 && i != 3){
            sessionStorage.setItem('inputs' + i, inputs[i].value);
        }
    }
    sessionStorage.setItem('radio0', inputs[2].checked);
    sessionStorage.setItem('radio1', inputs[3].checked);
    
    sessionStorage.setItem('textarea', textareas[0].value);
}

saveform();
focusoutform();

function resetform(){
    for(let i = 0; i < inputs.length; i++){
        if(i != 2 && i != 3 && i != 6 && i != 7){
            inputs[i].value = '';
        }
      }
      inputs[2].checked = false;
      inputs[1].checked = false;
    

      textareas[0].value = '';
}
