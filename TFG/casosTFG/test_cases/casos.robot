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

Login usuario
    [Documentation]     Login del usuario
    [Tags]    LoginDeUsuario
    Open browser        http://localhost/tfg/Login/Login.html       chrome      executable_path=${DRIVER}
    maximize browser window
    set selenium implicit wait  10
    set selenium speed      .1s
    element should be visible    //input[contains(@value,'Iniciar sesion')]
    input text      //input[contains(@id,'username')]     usuarioPrueba1
    sleep   1
    input text      //input[contains(@id,'password')]   123
    sleep   1
    click element       //input[@value='Iniciar sesion']
    element should be visible       //a[@href='Login.html'][contains(.,'Cerrar Sesión')]
    sleep   2
    close browser
Crear un Personaje
    [Documentation]     Creación de un personaje
    [Tags]    CrearPersonaje
    Open browser        http://localhost/tfg/Login/Login.html       chrome      executable_path=${DRIVER}
    maximize browser window
    set selenium implicit wait  10
    set selenium speed      .1s
    element should be visible    //input[contains(@value,'Iniciar sesion')]
    input text      //input[contains(@id,'username')]     usuarioPrueba1
    sleep   1
    input text      //input[contains(@id,'password')]   123
    sleep   1
    click element       //input[@value='Iniciar sesion']
    element should be visible       //a[@href='Login.html'][contains(.,'Cerrar Sesión')]
    sleep   2
    click button       //button[@class='menu-button']
    element should be visible       //a[@href='../Personaje/fichaPersonaje.html']
    sleep   1
    click element       //a[@href='../Personaje/fichaPersonaje.html']
    sleep       2
    element should be visible       //h2[contains(.,'Información básica')]
    input text      //input[@id='nombre']       Reynauld
    input text      //input[@id='raza']     Humano
    input text      //input[@id='clase']        Paladín
    input text      //input[@id='nivel']        1
    input text      //input[@id='trasfondo']        Acolito
    sleep   1
    click element       //select[@id='alineamiento']
    sleep   1
    click element       //option[@value='legal-bueno']
    input text      //input[@id='fuerza_valor']     20
    input text      //input[@id='destreza_valor']     11
    input text      //input[@id='constitucion_valor']     18
    input text      //input[@id='inteligencia_valor']     10
    input text      //input[@id='sabiduria_valor']     17
    input text      //input[@id='carisma_valor']     15
    sleep   1
    click button    //button[@name='guardar']
    sleep   2
    close browser

Crear una Campaña
    [Documentation]     Creación de una campaña
    [Tags]    CrearCampaña
    Open browser        http://localhost/tfg/Login/Login.html       chrome      executable_path=${DRIVER}
    maximize browser window
    set selenium implicit wait  10
    set selenium speed      .1s
    element should be visible    //input[contains(@value,'Iniciar sesion')]
    input text      //input[contains(@id,'username')]     usuarioPrueba1
    sleep   1
    input text      //input[contains(@id,'password')]   123
    sleep   1
    click element       //input[@value='Iniciar sesion']
    element should be visible       //a[@href='Login.html'][contains(.,'Cerrar Sesión')]
    sleep   2
    click button       //button[@class='menu-button']
    element should be visible       //a[@href='../campaña/campaña.html']
    sleep   1
    click element       //a[@href='../campaña/campaña.html']
    element should be visible       //h1[contains(.,'Datos de la campaña')]
    input text      //input[@id='nombre-campana']       Asesinato en Blackwater
    input text      //textarea[@id='descripcion-campana']   Ha habido un asesinato en la ciudad portuaria de blackwater, el alcalde es el principal sospechoso
    input text       //input[@id='fecha-inicio']        15062023
    input text      //input[@id='num-jugadores']        4
    sleep       2
    click element       //input[@value='Guardar']
    sleep   1
    close browser
Enviar invitacion a campaña
    [Documentation]     Invitas a un usuario existente a una campaña
    [Tags]    InvitarCampaña
    Open browser        http://localhost/tfg/Login/Login.html       chrome      executable_path=${DRIVER}
    maximize browser window
    set selenium implicit wait  10
    set selenium speed      .1s
    element should be visible    //input[contains(@value,'Iniciar sesion')]
    input text      //input[contains(@id,'username')]     usuarioPrueba1
    sleep   1
    input text      //input[contains(@id,'password')]   123
    sleep   1
    click element       //input[@value='Iniciar sesion']
    element should be visible       //a[@href='Login.html'][contains(.,'Cerrar Sesión')]
    sleep   2
    click button       //button[@class='menu-button']
    sleep   1
    click element       //a[@href='../campaña/invitarJugadores/invitarUsuarios.php']
    sleep   1
    element should be visible       //h1[contains(.,'Enviar Invitación de Juego')]
    input text      //textarea[@id='mensaje']       Hola!, necesitamos gente, te apuntas?
    sleep   1
    click element       //input[@value='Enviar Invitación']
    sleep   2
    close browser

Aceptar invitacion a campaña
    [Documentation]     Aceptar invitacion a la campaña
    [Tags]    AceptarCampaña
    Open browser        http://localhost/tfg/Login/Login.html       chrome      executable_path=${DRIVER}
    maximize browser window
    set selenium implicit wait  10
    set selenium speed      .1s
    element should be visible    //input[contains(@value,'Iniciar sesion')]
    input text      //input[contains(@id,'username')]     alvaro
    sleep   1
    input text      //input[contains(@id,'password')]   123
    sleep   1
    click element       //input[@value='Iniciar sesion']
    element should be visible       //a[@href='Login.html'][contains(.,'Cerrar Sesión')]
    sleep   2
    click button       //button[@class='menu-button']
    sleep   1
    click element       //a[@href='../campaña/aceptarInvitaciones/aceptarInvitaciones.php']
    element should be visible       (//button[@type='submit'])[1]
    sleep   1
    click button        (//button[@type='submit'])[1]
