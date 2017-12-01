<?php

ApplicationRoutes::draw(

  // CAPTCHA

  get("/captcha", "captcha#show"),


  get("/f6ee2d901976.html", "home#yandex"),

  // AJAX

  post("/ajax/producttype"),

  // LANGUAGE

  get("/lang/en"),
  get("/lang/tr"),

  // HOME

  root("home#index"),
  get("/home", "home#index"),
  get("/home/index"),
  get("/home/about_us"),
  get("/home/contact"),
  post("/home/mail_send"),

  //get("/home/categories/producttypes/products"),

  // get("/solutions/network", "solutionpage#network", "/home"),

  scope("/home",
    [
    get("/pages/:id", "page#show"),
    ],

    [
    get("/agendas", "agendapage#index"),
    get("/agendas/show/:id", "agendapage#show"),
    post("/agendas", "agendapage#index"),
    ],

    [
    get("/references", "referencepage#index"),
    ],

    [
    get("/categories", "categorypage#index"),
    get("/categories/show/:id", "categorypage#show")
    ],

    [
    get("/products", "productpage#index"),
    get("/products/search", "productpage#search"),
    get("/products/show/:id", "productpage#show"),
    post("/products/find", "productpage#find")
    ],

    [
    get("/producttypes/show/:id", "producttypepage#show"),
    post("/producttypes/find", "producttypepage#find")
    ],

    [
    get("/albums", "albumpage#index"),
    get("/albums/show/:id", "albumpage#show")
    ],

    [
    get("/documents", "documentpage#index")
    ],

    [
    get("/articles", "articlepage#index"),
    get("/articles/show/:id", "articlepage#show"),
    ]

    ),

  // ADMIN

  get("/admin", "admin#index"),
  get("/admin/index"),

  get("/admin/login"),
  post("/admin/login"),
  get("/admin/logout"),
  get("/admin/password_reset/:code", "admin#password_reset"),
  post("/admin/password_reset"),
  get("/admin/password_update"),
  post("/admin/password_update"),

  // get("/category", "category#index", "admin"),
  // resources("/category", "admin"),
  // post("/category/ajax", false, "admin"),

  scope("/admin",
    resources("/regions"),
    resources("/distributors"),
    resources("/categories"),
    resources("/producttypes"),
    resources("/products"),
    resources("/users"),
    resources("/partners"),
    resources("/references"),
    resources("/albums"),
    resources("/agendas"),
    resources("/slides"),
    resources("/notices"),
    resources("/pages"),
    resources("/documents"),
    resources("/articles"),
    [ post("/agendaimages/destroy") ],
    [ post("/albumimages/destroy") ],
    [
    get("/activations", "activations#index"),
    get("/activations/destroy_live"),
    get("/activations/destroy_dead"),
    get("/activations/destroy_all"),
    post("/activations/destroy")
    ],
    [
    get("/settings/show"),
    get("/settings/edit"),
    post("/settings/update"),
    ]
    )

  );

?>