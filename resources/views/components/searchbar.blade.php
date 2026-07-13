$cari = $_GET['cari'] ?? '';

$sort = $_GET['sort'] ?? 'nama_barang';

$allowedSort = ['nama_barang', 'harga', 'stok'];

if (!in_array($sort, $allowedSort)) {
    $sort = 'nama_barang';
}

$order = isset($_GET['order']) ? 'DESC' : 'ASC';
$mulai = trim($_GET['mulai'] ?? '');
$sql = "
    SELECT barang.*, kategori.nama_kategori
    FROM barang
    JOIN kategori ON barang.id_kategori = kategori.id_kategori
    WHERE 1=1
";
if ($cari != '') {
    $sql .= " AND (
        barang.nama_barang LIKE '%$cari%'
        OR barang.kode_barang LIKE '%$cari%'
        OR kategori.nama_kategori LIKE '%$cari%'
    )";
}

if ($mulai != '') {

    if ($sort == 'nama_barang') {
        $sql .= " AND nama_barang >= '$mulai'";
    } elseif ($sort == 'harga') {
        $sql .= " AND harga >= " . (int)$mulai;
    } elseif ($sort == 'stok') {
        $sql .= " AND stok >= " . (int)$mulai;
    }
}

$sql .= " ORDER BY $sort $order";

$data = $conn->query($sql);


<div class="input-group">

    <span class="input-group-text">

        <i class="bi bi-search"></i>

    </span>

    <input type="text" class="form-control" placeholder="Cari Kategori...">

</div>
