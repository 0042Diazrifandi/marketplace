public function riwayat()
{
    $model = new NftModel(); // contoh modelmu
    $userId = session()->get('user.id_user');

    $riwayat = $model->where('id_penjual', $userId)->findAll();

    return view('penjual/riwayat', [
        'riwayat' => $riwayat
    ]);
}
