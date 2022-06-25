<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'LoginController::index', ['as'=>'loginsistem']);
$routes->post('/login', 'LoginController::login', ['as'=>'login.pegawai']);

$routes->group('admin', ["filter" => "auth"] ,function($routes)
{
    $routes->get('dashboard','AdminDashboardController::index', ['as'=>'admin.dashboard']);
    $routes->get('logout','AdminDashboardController::logout', ['as'=>'admin.logout']);

    //profile
    $routes->group('profile', function($routes)
    {
        $routes->get('/','AdminProfileController::index', ['as'=>'admin.profile']);

        $routes->post('update/(:any)','AdminProfileController::update/$1', ['as'=>'admin.profile.update']);

        $routes->post('password/(:any)','AdminProfileController::password/$1', ['as'=>'admin.profile.update.password']);

        $routes->get('photo','AdminProfileController::photo', ['as'=>'admin.profile.photo']);
        $routes->post('photo/upload/(:any)','AdminProfileController::photoupload/$1', ['as'=>'admin.profile.photo.upload']);
    });

    // pegawai
    $routes->group('pegawai', function($routes)
    {
        $routes->get('/','AdminPegawaiController::index', ['as'=>'admin.pegawai']);

        $routes->get('report','AdminPegawaiController::report', ['as'=>'admin.pegawai.report']);

        $routes->get('create','AdminPegawaiController::create',  ['as'=>'admin.pegawai.create']);
        $routes->post('store','AdminPegawaiController::store', ['as'=>'admin.pegawai.store']);

        $routes->get("edit/(:any)", "AdminPegawaiController::edit/$1", ['as'=>'admin.pegawai.edit']);
        $routes->post("update/(:any)", "AdminPegawaiController::update/$1", ['as'=>'admin.pegawai.update']);

        $routes->get("delete/(:any)", "AdminPegawaiController::delete/$1", ['as'=>'admin.pegawai.delete']);
    });

    //jabatan
    $routes->group('jabatan', function($routes)
    {
        $routes->get('/','AdminJabatanController::index', ['as'=>'admin.jabatan']);

        $routes->post('store','AdminJabatanController::store', ['as'=>'admin.jabatan.store']);

        $routes->get("edit/(:any)", "AdminJabatanController::edit/$1", ['as'=>'admin.jabatan.edit']);
        $routes->post("update/(:any)", "AdminJabatanController::update/$1", ['as'=>'admin.jabatan.update']);

        $routes->get("delete/(:any)", "AdminJabatanController::delete/$1", ['as'=>'admin.jabatan.delete']);
    });

});

$routes->group('pelayanan', ["filter" => "auth"] ,function($routes)
{
    $routes->get('dashboard','PelayananDashboardController::index', ['as'=>'pelayanan.dashboard']);
    $routes->get('logout','PelayananDashboardController::logout', ['as'=>'pelayanan.logout']);

    $routes->group('profile', function($routes)
    {
        $routes->get('/','PelayananProfileController::index', ['as'=>'pelayanan.profile']);

        $routes->post('update/(:any)','PelayananProfileController::update/$1', ['as'=>'pelayanan.profile.update']);

        $routes->post('password/(:any)','PelayananProfileController::password/$1', ['as'=>'pelayanan.profile.update.password']);

        $routes->get('photo','PelayananProfileController::photo', ['as'=>'pelayanan.profile.photo']);
        $routes->post('photo/upload/(:any)','PelayananProfileController::photoupload/$1', ['as'=>'pelayanan.profile.photo.upload']);
    });

    $routes->group('domisili', function($routes)
    {
        $routes->get('/','PelayananSKDomisiliController::index', ['as'=>'pelayanan.domisili']);
        $routes->get('report','PelayananSKDomisiliController::report', ['as'=>'pelayanan.domisili.report']);

        $routes->get("cetak/(:any)", "PelayananSKDomisiliController::cetak/$1", ['as'=>'pelayanan.domisili.cetak']);

        $routes->get('create','PelayananSKDomisiliController::create', ['as'=>'pelayanan.domisili.create']);
        $routes->post('store','PelayananSKDomisiliController::store', ['as'=>'pelayanan.domisili.store']);
        $routes->get("edit/(:any)", "PelayananSKDomisiliController::edit/$1", ['as'=>'pelayanan.domisili.edit']);
        $routes->post("update/(:any)", "PelayananSKDomisiliController::update/$1", ['as'=>'pelayanan.domisili.update']);
        $routes->get("delete/(:any)", "PelayananSKDomisiliController::delete/$1", ['as'=>'pelayanan.domisili.delete']);
    });
    
    $routes->group('kematian', function($routes)
    {
        $routes->get('/','PelayananSKKematianController::index', ['as'=>'pelayanan.kematian']);
        $routes->get('report','PelayananSKKematianController::report', ['as'=>'pelayanan.kematian.report']);

        $routes->get("cetak/(:any)", "PelayananSKKematianController::cetak/$1", ['as'=>'pelayanan.kematian.cetak']);

        $routes->get('create','PelayananSKKematianController::create', ['as'=>'pelayanan.kematian.create']);
        $routes->post('store','PelayananSKKematianController::store', ['as'=>'pelayanan.kematian.store']);
        $routes->get("edit/(:any)", "PelayananSKKematianController::edit/$1", ['as'=>'pelayanan.kematian.edit']);
        $routes->post("update/(:any)", "PelayananSKKematianController::update/$1", ['as'=>'pelayanan.kematian.update']);
        $routes->get("delete/(:any)", "PelayananSKKematianController::delete/$1", ['as'=>'pelayanan.kematian.delete']);
    });

    $routes->group('tidakmampu', function($routes)
    {
        $routes->get('/','PelayananSKTidakMampuController::index', ['as'=>'pelayanan.tidakmampu']);
        $routes->get('report','PelayananSKTidakMampuController::report', ['as'=>'pelayanan.tidakmampu.report']);

        $routes->get("cetak/(:any)", "PelayananSKTidakMampuController::cetak/$1", ['as'=>'pelayanan.tidakmampu.cetak']);

        $routes->get('create','PelayananSKTidakMampuController::create', ['as'=>'pelayanan.tidakmampu.create']);
        $routes->post('store','PelayananSKTidakMampuController::store', ['as'=>'pelayanan.tidakmampu.store']);
        $routes->get("edit/(:any)", "PelayananSKTidakMampuController::edit/$1", ['as'=>'pelayanan.tidakmampu.edit']);
        $routes->post("update/(:any)", "PelayananSKTidakMampuController::update/$1", ['as'=>'pelayanan.tidakmampu.update']);
        $routes->get("delete/(:any)", "PelayananSKTidakMampuController::delete/$1", ['as'=>'pelayanan.tidakmampu.delete']);
    });

    $routes->group('pindahdatang', function($routes)
    {
        $routes->get('/','PelayananSKPindahDatangController::index', ['as'=>'pelayanan.pindahdatang']);
        $routes->get('report','PelayananSKPindahDatangController::report', ['as'=>'pelayanan.pindahdatang.report']);

        $routes->get("cetak/(:any)", "PelayananSKPindahDatangController::cetak/$1", ['as'=>'pelayanan.pindahdatang.cetak']);

        $routes->get('create','PelayananSKPindahDatangController::create', ['as'=>'pelayanan.pindahdatang.create']);
        $routes->post('store','PelayananSKPindahDatangController::store', ['as'=>'pelayanan.pindahdatang.store']);
        $routes->get("edit/(:any)", "PelayananSKPindahDatangController::edit/$1", ['as'=>'pelayanan.pindahdatang.edit']);
        $routes->post("update/(:any)", "PelayananSKPindahDatangController::update/$1", ['as'=>'pelayanan.pindahdatang.update']);
        $routes->get("delete/(:any)", "PelayananSKPindahDatangController::delete/$1", ['as'=>'pelayanan.pindahdatang.delete']);
    });

    $routes->group('kelahiran', function($routes)
    {
        $routes->get('/','PelayananSKKelahiranController::index', ['as'=>'pelayanan.kelahiran']);
        $routes->get('report','PelayananSKKelahiranController::report', ['as'=>'pelayanan.kelahiran.report']);

        $routes->get("cetak/(:any)", "PelayananSKKelahiranController::cetak/$1", ['as'=>'pelayanan.kelahiran.cetak']);

        $routes->get('create','PelayananSKKelahiranController::create', ['as'=>'pelayanan.kelahiran.create']);
        $routes->post('store','PelayananSKKelahiranController::store', ['as'=>'pelayanan.kelahiran.store']);
        $routes->get("edit/(:any)", "PelayananSKKelahiranController::edit/$1", ['as'=>'pelayanan.kelahiran.edit']);
        $routes->post("update/(:any)", "PelayananSKKelahiranController::update/$1", ['as'=>'pelayanan.kelahiran.update']);
        $routes->get("delete/(:any)", "PelayananSKKelahiranController::delete/$1", ['as'=>'pelayanan.kelahiran.delete']);
    });

    $routes->group('penduduk', function($routes)
    {
        $routes->get('/','PelayananPendudukController::index', ['as'=>'pelayanan.penduduk']);

        $routes->get("cetak/(:any)", "PelayananPendudukController::cetak/$1", ['as'=>'pelayanan.penduduk.cetak']);

        $routes->get('create','PelayananPendudukController::create', ['as'=>'pelayanan.penduduk.create']);
        $routes->post('store','PelayananPendudukController::store', ['as'=>'pelayanan.penduduk.store']);
        $routes->get("edit/(:any)", "PelayananPendudukController::edit/$1", ['as'=>'pelayanan.penduduk.edit']);
        $routes->post("update/(:any)", "PelayananPendudukController::update/$1", ['as'=>'pelayanan.penduduk.update']);
        $routes->get("delete/(:any)", "PelayananPendudukController::delete/$1", ['as'=>'pelayanan.penduduk.delete']);

        $routes->get('detail/(:any)','PelayananDetailPendudukController::index/$1', ['as'=>'pelayanan.penduduk.detail']);

        $routes->get('tambah_ayah/(:any)','PelayananDetailPendudukController::tambah_ayah/$1', ['as'=>'pelayanan.penduduk.ayah.tambah']);
        $routes->post('store_ayah','PelayananDetailPendudukController::store_ayah', ['as'=>'pelayanan.penduduk.ayah.store']);
        $routes->get("edit_ayah/(:any)", "PelayananDetailPendudukController::edit_ayah/$1", ['as'=>'pelayanan.penduduk.ayah.edit']);
        $routes->post("update_ayah/(:any)", "PelayananDetailPendudukController::update_ayah/$1", ['as'=>'pelayanan.penduduk.ayah.update']);
        $routes->get("delete_ayah/(:any)", "PelayananDetailPendudukController::delete_ayah/$1", ['as'=>'pelayanan.penduduk.ayah.delete']);

        $routes->get('tambah_ibu/(:any)','PelayananDetailPendudukController::tambah_ibu/$1', ['as'=>'pelayanan.penduduk.ibu.tambah']);
        $routes->post('store_ibu','PelayananDetailPendudukController::store_ibu', ['as'=>'pelayanan.penduduk.ibu.store']);
        $routes->get("edit_ibu/(:any)", "PelayananDetailPendudukController::edit_ibu/$1", ['as'=>'pelayanan.penduduk.ibu.edit']);
        $routes->post("update_ibu/(:any)", "PelayananDetailPendudukController::update_ibu/$1", ['as'=>'pelayanan.penduduk.ibu.update']);
        $routes->get("delete_ibu/(:any)", "PelayananDetailPendudukController::delete_ibu/$1", ['as'=>'pelayanan.penduduk.ibu.delete']);

        $routes->get('tambah_anak/(:any)','PelayananDetailPendudukController::tambah_anak/$1', ['as'=>'pelayanan.penduduk.anak.tambah']);
        $routes->post('store_anak','PelayananDetailPendudukController::store_anak', ['as'=>'pelayanan.penduduk.anak.store']);
        $routes->get("edit_anak/(:any)", "PelayananDetailPendudukController::edit_anak/$1", ['as'=>'pelayanan.penduduk.anak.edit']);
        $routes->post("update_anak/(:any)", "PelayananDetailPendudukController::update_anak/$1", ['as'=>'pelayanan.penduduk.anak.update']);
        $routes->get("delete_anak/(:any)", "PelayananDetailPendudukController::delete_anak/$1", ['as'=>'pelayanan.penduduk.anak.delete']);
    });
});

$routes->group('kades', ["filter" => "auth"] ,function($routes)
{
    $routes->get('dashboard','KadesDashboardController::index', ['as'=>'kades.dashboard']);
    $routes->get('logout','KadesDashboardController::logout', ['as'=>'kades.logout']);

    $routes->group('profile', function($routes)
    {
        $routes->get('/','KadesProfileController::index', ['as'=>'kades.profile']);

        $routes->post('update/(:any)','KadesProfileController::update/$1', ['as'=>'kades.profile.update']);

        $routes->post('password/(:any)','KadesProfileController::password/$1', ['as'=>'kades.profile.update.password']);

        $routes->get('photo','KadesProfileController::photo', ['as'=>'kades.profile.photo']);
        $routes->post('photo/upload/(:any)','KadesProfileController::photoupload/$1', ['as'=>'kades.profile.photo.upload']);
    });

    $routes->get('pegawai','KadesPegawaiController::index', ['as'=>'kades.pegawai']);

    $routes->get('pelayanan','KadesPelayananController::index', ['as'=>'kades.pelayanan']);
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
