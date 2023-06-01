*** Settings ***
Library     SeleniumLibrary

*** Variables ***
${navegador}=       chrome
${DRIVER}=   C:/Drivers/chromedriver.exe



*** Test Cases ***
registrar usuario

    [Documentation]     Registro de un usuario comun
    [Tags]    registroDeUsuario
    Open browser        http://localhost/tfg/Login/Login.html       chrome      executable_path=${DRIVER}
    maximize browser window
    set selenium implicit wait  10
    set selenium speed      .1s
    element should be visible    //a[@href='../registro/registro.html'][contains(.,'Nuevo usuario?')]
    sleep   1
    click element  //a[@href='../registro/registro.html'][contains(.,'Nuevo usuario?')]

    sleep   1
    element should be visible       //input[contains(@id,'username')]
    input text      //input[contains(@id,'username')]       usuarioPrueba1
    sleep   1
    input text       //input[@id='password']        123
    sleep   1
    input text      //input[contains(@id,'Rpassword')]      123
    sleep   1
    click element      //input[@value='Registrarse']
    sleep   3
    close browser
