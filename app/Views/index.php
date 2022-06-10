<?= $this->extend('/layout/template'); ?>

<?= $this->section('content');?>
<h2>Hello, <?= $user->nama ?>!</h2>
<?= $this->endSection(); ?>