<?php
require_once __DIR__ . '/fitur/penjumlahan.php';
require_once __DIR__ . '/fitur/pengurangan.php';

$hasil = null;
$error = null;
$a = $_POST['a'] ?? '';
$b = $_POST['b'] ?? '';
$op = $_POST['op'] ?? 'tambah';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!is_numeric($a) || !is_numeric($b)) {
        $error = 'Masukkan angka yang valid.';
    } elseif ($op === 'tambah') {
        $hasil = penjumlahan((float)$a, (float)$b);
    } elseif ($op === 'kurang') {
        $hasil = pengurangan((float)$a, (float)$b);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kalkulator Sederhana</title>
</head>
<body>
  <h2>Kalkulator Sederhana</h2>
  <form method="post">
    <input type="number" step="any" name="a" value="<?= htmlspecialchars($a) ?>" required>
    <select name="op">
      <option value="tambah" <?= $op === 'tambah' ? 'selected' : '' ?>>+ Penjumlahan</option>
      <option value="kurang" <?= $op === 'kurang' ? 'selected' : '' ?>>- Pengurangan</option>
    </select>
    <input type="number" step="any" name="b" value="<?= htmlspecialchars($b) ?>" required>
    <button type="submit">Hitung</button>
  </form>
  <?php if ($error): ?>
    <p><?= htmlspecialchars($error) ?></p>
  <?php elseif ($hasil !== null): ?>
    <p>Hasil: <strong><?= htmlspecialchars((string)$hasil) ?></strong></p>
  <?php endif; ?>
</body>
</html>