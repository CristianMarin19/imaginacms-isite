<?php

return [
    'yes' => 'Si',
    'no' => 'No',
    'menu' => [
        'home' => 'Inicio',
        'viewMore' => 'Ver más',
    ],
    'settings' => [
        'wizardTenantType' => 'Tipo de Wizard',
        'logo1' => 'Logo N°1',
        'logo2' => 'Logo N°2',
        'logo3' => 'Logo N°3',
        'logoIadmin' => 'Logo Iadmin',
        'logoIadminSM' => 'Logo Iadmin SM',
        'favicon' => 'Favicon',
        'addressBar' => 'Color de la barra de direcciones',
        'brandPrimary' => 'Color Primario',
        'primaryContrast' => 'Contraste Primario',
        'brandSecondary' => 'Color Secundario',
        'secondaryContrast' => 'Contraste Secundario',
        'brandTertiary' => 'Color Terciario',
    'tertiaryContrast' => 'Contraste Terciario',
    'brandQuaternary' => 'Color Cuaternario',
    'quaternaryContrast' => 'Contraste Cuaternario',
    'brandPositive' => 'Color Positivo',
    'brandNegative' => 'Color Negativo',
    'brandFaded' => 'Color Desvanecido',
    'brandInfo' => 'Color Información',
    'brandWarning' => 'Color Advertencia',
    'brandDark' => 'Color Oscuro',
    'brandLight' => 'Color Claro',
    'brandAccent' => 'Color Acento',
    'headerLayout' => 'Layout para la Cabecera del sitio',
    'footerLayout' => 'Layout para el Pié del sitio',
    'phones' => 'Teléfonos',
    'addresses' => 'Direcciones',
    'emails' => 'Correos',
    'socialNetworks' => 'Redes sociales',
    'branchOffices' => 'Sucursales',
    'activateCaptcha' => 'Activar google captcha',
    'reCaptchaV2Secret' => 'Codigo Secreto Recaptcha V2',
    'reCaptchaV2Site' => 'Codigo de sitio Recaptcha V2',
    'reCaptchaV3Secret' => 'Codigo Secreto Recaptcha V3',
    'reCaptchaV3Site' => 'Codigo de sitio Recaptcha V3',
    'rolesToTenant' => 'Roles habilitados como inquilinos',
    'apimaps' => 'Codigo Google Maps',
    'apiOpenStreetMaps' => 'Codigo Open Street Maps',
    'customCss' => 'CSS Personalizado para el Body',
    'customJs' => 'JS Personalizado para el Body',
    'headerCustomJs' => 'JS Personalizado para el Head',
    'tenantRouteAlias' => 'Alias de la ruta de aterrizaje para los Inquilinos',
    'itemsTabs' => 'Ingresa Titulos para los tabs',
    "whatsapp" => [
      "callingCode" => "Cód del país",
      "number" => "Número del whatsapp",
      "message" => "Mensaje por defecto",
      "label" => "Etiqueta",
      "icon-label" => "Icono",
    ],
    'googleClient' => 'Cliente Google',
    'facebookClient' => 'Cliente Facebook',
    'facebookAppId' => 'App Id Facebook',
    'microsoftClientId' => 'Cliente Microsoft',
    'microsoftScopeLogin' => 'Alcances de inicio de sesión de Microsoft',
    'microsoftAuthUrl' => 'URL de autoridad de Microsoft',
    'labelTimeExpiredToken' => 'Tiempo caducidad Tokens Descarga (Dias)',
    'enableDynamicFieldsCache' => 'Activar caché de dynamic fields en frontend',
    'usersToNotify' => 'Usuarios Para Notificar Cambios En La Aplicación',
    'emailsToNotify' => 'Correos Electrónicos Para Notificar Cambios En La Aplicación',
    'groupNameNotifyChanges' => 'Notificar Cambios En La Aplicación',
    'tenant' => [
      'group' => 'Inquilinos',
      'tenantWithCentralData' => 'Entidades con data central',
      'entities' => [
        'setting' => 'Settings',
        'page' => 'Páginas',
        'slider' => 'Sliders',
        'slide' => 'Slides',
        'menu' => 'Menus',
        'menuitem' => 'Menus Items',
      ],
      'defaultTenantStatus' => 'Default Tenant Status'
    ],
    'cms' => [
      'legacyStructureCMS' => 'Usar Estructura heredada CMS',
      'offline' => 'Offline Activado',
      'iadminTheme' => [
        "title" => "Tema Iadmin",
        "theme1" => "Tema 1",
        "theme2" => "Tema 2"
      ],
      'showGoToSiteButton' => 'Mostrar boton "Ver Sitio"'
    ],
    'defaultLayout' => 'Plantilla por defecto',
    'markerLabelFontSize' => 'Tamaño de la Fuente | Etiqueta del Marcador',
    'markerLabelFontWeight' => 'Grosor de la Fuente | Etiqueta del Marcador',
    'markerLabelColor' => 'Color de la fuente| Etiqueta del Marcador',
    'markerLabelTopPosition' => 'Top Position | Etiqueta del Marcador',
  ],
  'settingHints' => [
    'phones' => "Ingresa un número telefónico y presiona enter",
    'addresses' => "Ingresa una dirección y presiona enter",
    'emails' => "Ingresa un correo electrónico y presiona enter",
    'itemsTabs' => "Ingresa un titulo para identificar los tabs",
    'defaultLayout' => "Se asignara cuando se cree una organización",
  ],
  'settingGroups' => [
    'media' => 'Media',
    'colors' => 'Colores',
    'socialNetworks' => 'Redes sociales',
    'apiKeys' => "Llaves API",
    'contact' => 'Contacto',
    'customSources' => 'Fuentes Personalizadas',
    'tenants' => 'Inquilinos',
    'modalVerifier' => 'Modal Verificador',
    'components' => 'Componentes',
    'sitemap' => 'Mapa Del Sitio',
    'title' => 'Agrega tu logo',
    'groupNameTimeToken' => 'Tokens',
    'media' => [
      'title' => 'Agrega tu Imagen',
      'description' => 'Agregar el logo de tu empresa'
    ],
    'general' => [
      'title' => 'Datos Principales',
      'description' => 'Personaliza los datos principales de tu sitio'
    ],
    'colors' => [
      'title' => 'Personaliza los colores',
      'description' => 'Dale personalidad a tu página web con tus colores corpoativos'
    ],
    'socialNetworks' => [
      'title' => 'Redes sociales',
      'description' => 'Enlaza las redes sociales de tu empresa con tu sitio web'
    ],
    'apiKeys' => [
      'title' => 'Llaves API',
      'description' => 'Llaves API'
    ],
    'contact' => [
      'title' => 'Datos de contacto',
      'description' => 'Ingresa los datos de contacto de tu sitio web'
    ],
    'customSources' => [
      'title' => 'Fuentes Personalizadas',
      'description' => 'Fuentes Personalizadas'
    ],
    'tenants' => [
      'title' => 'Inquilinos',
      'description' => 'Inquilinos'
    ],
    'modalVerifier' => [
      'title' => 'Modal Verificador',
      'description' => 'Modal Verificador'
    ],
    'pdf' => [
      'title' => 'PDF',
      'description' => 'PDF'
    ],
    'pdf' => [
      'title' => 'PDF',
      'description' => 'PDF'
    ],
    'maps' => [
      'title' => 'Mapas',
      'description' => 'Mapas'
    ],
    'cms' => [
      'title' => 'CMS',
      'description' => 'Configuraciones de CMS'
    ]
  ],
  'messages' => [
    'no items' => 'No existe información disponible',
    'tokensValidate' => 'El token a expirado'
  ],
  'form' => [
    'validations' => [
      "require" => "El campo :attribute es obligatorio"
    ]
  ],
  'sort' => [
    'title' => 'Ordenar Por',
    'all' => 'Todas',
    'name_a_z' => 'Nombre (A - Z)',
    'name_z_a' => 'Nombre (Z - A)',
    'price_low_high' => 'Precio: bajo a alto',
    'price_high_low' => 'Precio alto a bajo',
    'recently' => 'Más Recientes',
  ],
  'editLink' => [
    'tooltip' => 'Editar esta sección',
    'tooltipCategory' => 'Editar esta categoria',
    'tooltipProduct' => 'Editar este producto',
    'tooltipManufacturer' => 'Editar este fabricante',
    'tooltipPost' => 'Editar este post',
    'tooltipSlide' => 'Editar este slide',
    'tooltipLogo' => 'Editar este logo',
    'buttonEdit' => 'Editar',
    'tooltipPlace' => 'Editar este lugar',
    'tooltipSocial' => 'Editar redes sociales',
    'tooltipWhatsapp' => 'Editar whatsapp',
    'tooltipAddress' => 'Editar direccion',
    'tooltipEmail' => 'Editar correo electronico',
    'tooltipPhone' => 'Editar telefono',
    'tooltipLogo' => 'Editar este logo',
    'tooltipAd' => 'Editar este anuncio',
  ],
  'maps' => [
    'groupMaps' => 'Mapas',
    'mapsLabel' => 'Mapas en el sitio',
    'labelLocationSite' => 'Ubicación Sede Principal',
    'labelLocationName' => 'Nombre Sede Principal',
    'labelIframeMap' => 'Iframe Mapa Ubicación Sede Principal',
    'groupMarkersDistance' => 'Distancia (En mts) entre 2 puntos para agruparlos en un solo Marcador',
  ],
  'feeds' => [
    'titlePosts' => 'Todas las nuevas publicaciones en ',
    'titleProducts' => 'Todos los nuevos productos en ',
  ],
  'whatsapp' => [
    'labelWhatsappLayout5' => '¿Hablamos?',
    'titleWhatsappLayout5' => 'WhatsApp',
    'descriptionWhatsappLayout5' => 'Hola, ¿En que podemos ayudarte?',
  ],
  'sitemap' => [
    'labelSitemapDepth' => 'Profundidad Del Mapa Del Sitio',
    'labelUserAgentRobots' => 'Agentes De Busqueda Para El Archivo Robots.txt',
    'labelActiveGenerateRobotsFile' => 'Sitemap Con Archivo Robots.txt',
  ],
  'infoContact' => [
    'title' => 'Datos de contacto',
    'titlePhone' => 'Teléfono',
    'titleAddress' => 'Dirección',
    'titleEmail' => 'Correo Electrónico',
  ],
  'filters' => [
    'autocomplete' => [
      'labelButtonSearch' => 'Buscar',
    ],
  ],
  'button' => [
    'update' => 'Actualizar'
  ],
  'viewErrors' => [
    'message' => 'Lo sentimos, esta página no esta disponible.',
    'globe' => 'Intenta más adelante',
  ],
];
