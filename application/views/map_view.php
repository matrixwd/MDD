<?php include 'application/views/header.php'?>
<script type="text/javascript">
    var centreGot = false;
</script>
<?php echo $map['js']; ?>
</head>

<body>

<header>
    <?php include 'includes/map_nav.php'; ?>
</header>

<div id="wrapper">

<?php echo $map['html']; ?>

<?php include 'application/views/footer.php';?>