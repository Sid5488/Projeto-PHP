function entradaDados (caracter, tipo) {
    let er = new RegExp("[!¡$%&/\()=?¿*+-_{}.\s][^>][^<]");
    
    if (window.event) {
        var ascII = caracter.charCode;
        console.log(ascII);
    }
    else {
        var ascII = caracter.which;
        
    }
    
    if (tipo == "numeros") {
        if (ascII >= 48 && ascII <= 57) {
            return false;
        }
    }
    else if (tipo == "letras") {
        if (ascII < 48  || ascII > 57 ) {
            return false;
        }
    }
    //else if (tipo == "caracterEsp") {
        //if (ascII == er) {
            //return false;
        //}
    //}
}

/* [!¡$%&/\()=?¿*+-_{}.\s][^>][^<] */

function mascaraDataNasc(obj, caracter) {
    if (entradaDados(caracter, 'letras') == false) {
        return false;
    }
    else {
        var input = obj.value;
        var id = obj.id;
        var result = input;
        
        if (input.length == 2) {
            result += "/";
        }
        else if (input.length == 5) {
            result += "/";     
        }
        else if (input.length == 10) {
            return false;
        }
        document.getElementById(id).value = result;
    }
}

function mascaraCelular(obj, caracter) {
    if (entradaDados(caracter, 'letras') == false) {
        return false;
    }
    else {
        var input = obj.value;
        var id = obj.id;
        var result = input;
        
        if (input.length == 0) {
            result = "(";
        }
        else if (input.length == 4) {
            result += ")";
        }
        else if(input.length == 5) {
            result += " ";
        }
        else if (input.length == 9) {
            result += "-";
        }
        else if (input.length == 14) {
            return false;     
        }
        document.getElementById(id).value = result;
    }
}