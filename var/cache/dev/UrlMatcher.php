<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null]],
        '/Adminall' => [[['_route' => 'afficheAdmin', '_controller' => 'App\\Controller\\AdminController::afficher'], null, null, null, false, false, null]],
        '/createAdmin' => [[['_route' => 'app_admin_addadmin', '_controller' => 'App\\Controller\\AdminController::addAdmin'], null, null, null, false, false, null]],
        '/event' => [[['_route' => 'event', '_controller' => 'App\\Controller\\EventController::index'], null, null, null, false, false, null]],
        '/AfficherEvent' => [[['_route' => 'event-class', '_controller' => 'App\\Controller\\EventController::afficher'], null, null, null, false, false, null]],
        '/gerant/AddEvent' => [[['_route' => 'add-event', '_controller' => 'App\\Controller\\EventController::AddEvent'], null, null, null, false, false, null]],
        '/gerant' => [[['_route' => 'gerant', '_controller' => 'App\\Controller\\GerantController::index'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_index_home', '_controller' => 'App\\Controller\\IndexController::home'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\LoginController::index'], null, null, null, false, false, null]],
        '/menu' => [[['_route' => 'menu', '_controller' => 'App\\Controller\\MenuController::index'], null, null, null, false, false, null]],
        '/menu/add' => [[['_route' => 'add-menu', '_controller' => 'App\\Controller\\MenuController::AddMenu'], null, null, null, false, false, null]],
        '/pdf' => [[['_route' => 'menu_pdf', '_controller' => 'App\\Controller\\MenuController::listPDF'], null, null, null, false, false, null]],
        '/message' => [[['_route' => 'message', '_controller' => 'App\\Controller\\MessageController::index'], null, null, null, false, false, null]],
        '/sendMessage' => [[['_route' => 'sendMessage', '_controller' => 'App\\Controller\\MessageController::addMessage'], null, null, null, false, false, null]],
        '/messages' => [[['_route' => 'messages', '_controller' => 'App\\Controller\\MessageController::messages'], null, null, null, false, false, null]],
        '/photo' => [[['_route' => 'photo', '_controller' => 'App\\Controller\\PhotoController::index'], null, null, null, false, false, null]],
        '/affichePhoto' => [[['_route' => 'affichePhoto', '_controller' => 'App\\Controller\\PhotoController::afficher'], null, null, null, false, false, null]],
        '/photo/add' => [[['_route' => 'addPhoto', '_controller' => 'App\\Controller\\PhotoController::addPhoto'], null, null, null, false, false, null]],
        '/Reclamation' => [[['_route' => 'Reclamation', '_controller' => 'App\\Controller\\ReclamationController::afficher'], null, null, null, false, false, null]],
        '/createReclamation' => [[['_route' => 'app_reclamation_addreclamation', '_controller' => 'App\\Controller\\ReclamationController::addReclamation'], null, null, null, false, false, null]],
        '/reclamation' => [[['_route' => 'reclamation', '_controller' => 'App\\Controller\\ReclamationController::index'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'register', '_controller' => 'App\\Controller\\RegisterController::register'], null, null, null, false, false, null]],
        '/Reservation' => [[['_route' => 'Reservation', '_controller' => 'App\\Controller\\ReservationController::index'], null, null, null, false, false, null]],
        '/afficheReservation' => [[['_route' => 'afficheReservation', '_controller' => 'App\\Controller\\ReservationController::afficher'], null, null, null, false, false, null]],
        '/Reservation/add' => [[['_route' => 'app_reservation_addreservation', '_controller' => 'App\\Controller\\ReservationController::addReservation'], null, null, null, false, false, null]],
        '/room' => [[['_route' => 'room', '_controller' => 'App\\Controller\\RoomController::index'], null, null, null, false, false, null]],
        '/afficheRoom' => [[['_route' => 'afficheRoom', '_controller' => 'App\\Controller\\RoomController::afficher'], null, null, null, false, false, null]],
        '/room/add' => [[['_route' => 'addRoom', '_controller' => 'App\\Controller\\RoomController::AddRoom'], null, null, null, false, false, null]],
        '/user' => [[['_route' => 'user', '_controller' => 'App\\Controller\\UserController::index'], null, null, null, false, false, null]],
        '/afficheUser' => [[['_route' => 'afficheUser', '_controller' => 'App\\Controller\\UserController::afficher'], null, null, null, false, false, null]],
        '/user/add' => [[['_route' => 'app_user_adduser', '_controller' => 'App\\Controller\\UserController::addUser'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/delete(?'
                    .'|Admin/([^/]++)(*:193)'
                    .'|Message/([^/]++)(*:217)'
                    .'|R(?'
                        .'|eclamation/([^/]++)(*:248)'
                        .'|oom/([^/]++)(*:268)'
                    .')'
                .')'
                .'|/u(?'
                    .'|pdate(?'
                        .'|Admin/([^/]++)(*:305)'
                        .'|Photo/([^/]++)(*:327)'
                        .'|Reclamation/([^/]++)(*:355)'
                    .')'
                    .'|ser/update/([^/]++)(*:383)'
                .')'
                .'|/gerant/(?'
                    .'|DeleteEvent/([^/]++)(*:423)'
                    .'|updateMenu/([^/]++)(*:450)'
                .')'
                .'|/Afficher(?'
                    .'|Event/([^/]++)(*:485)'
                    .'|Menu/([^/]++)(*:506)'
                .')'
                .'|/m(?'
                    .'|enu/search/([^/]++)(*:539)'
                    .'|odifyMessage/([^/]++)(*:568)'
                .')'
                .'|/event/Delete/([^/]++)(*:599)'
                .'|/Supp/([^/]++)(?'
                    .'|(*:624)'
                .')'
                .'|/room/update/([^/]++)(*:654)'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        193 => [[['_route' => 'deleteAdmin', '_controller' => 'App\\Controller\\AdminController::supprimerAdmin'], ['id'], null, null, false, true, null]],
        217 => [[['_route' => 'deleteMessage', '_controller' => 'App\\Controller\\MessageController::deleteMessage'], ['id'], null, null, false, true, null]],
        248 => [[['_route' => 'deleteReclamation', '_controller' => 'App\\Controller\\ReclamationController::supprimerReclamation'], ['id'], null, null, false, true, null]],
        268 => [[['_route' => 'deleteRoom', '_controller' => 'App\\Controller\\RoomController::deleteRoom'], ['id'], null, null, false, true, null]],
        305 => [[['_route' => 'updateAdmin', '_controller' => 'App\\Controller\\AdminController::updateAdmin'], ['id'], null, null, false, true, null]],
        327 => [[['_route' => 'updateP', '_controller' => 'App\\Controller\\PhotoController::update'], ['id'], null, null, false, true, null]],
        355 => [[['_route' => 'updateReclamation', '_controller' => 'App\\Controller\\ReclamationController::updateReclamation'], ['id'], null, null, false, true, null]],
        383 => [[['_route' => 'update', '_controller' => 'App\\Controller\\UserController::update'], ['id'], null, null, false, true, null]],
        423 => [[['_route' => 'delete-event', '_controller' => 'App\\Controller\\EventController::DeleteEvent'], ['id'], null, null, false, true, null]],
        450 => [[['_route' => 'updateM', '_controller' => 'App\\Controller\\MenuController::update'], ['id'], null, null, false, true, null]],
        485 => [[['_route' => 'participate', '_controller' => 'App\\Controller\\EventController::ParticipateToEvent'], ['id'], null, null, false, true, null]],
        506 => [[['_route' => 'menu-class', '_controller' => 'App\\Controller\\MenuController::Affiche'], ['crit'], null, null, false, true, null]],
        539 => [[['_route' => 'search', '_controller' => 'App\\Controller\\MenuController::search'], ['text'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        568 => [[['_route' => 'modifyMessage', '_controller' => 'App\\Controller\\MessageController::modifyMessage'], ['id'], null, null, false, true, null]],
        599 => [[['_route' => 'deleteM', '_controller' => 'App\\Controller\\MenuController::Delete'], ['id'], null, null, false, true, null]],
        624 => [
            [['_route' => 'delete', '_controller' => 'App\\Controller\\PhotoController::supprimerPhoto'], ['id'], null, null, false, true, null],
            [['_route' => 'd', '_controller' => 'App\\Controller\\UserController::supprimerC'], ['id'], null, null, false, true, null],
        ],
        654 => [
            [['_route' => 'updateRoom', '_controller' => 'App\\Controller\\RoomController::update'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
