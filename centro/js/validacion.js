/**
 * validacion de los campos requeridos  para solo aceptar letras.
 * @param {type} e
 * @returns {Boolean}
 */
function validar(e) { // 1

  tecla = (document.all) ? e.keyCode : e.which; // 2

  if (tecla == 8)
    return true; // 3

  patron = /[A-Za-z\s]/; // 4

  te = String.fromCharCode(tecla); // 5

  return patron.test(te); // 6
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


