<?php $this->output('header');?>

<script src="<?php echo $this->uri->baseUri; ?>assets/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function loadKabupaten(){
        var propinsi = $("#provinsi").val();
        $.ajax({
            type:'GET',
            url:"<?php echo $this->location('home/kabupaten'); ?>",
            data:"id=" + propinsi,
            success: function(html){ 
               $("#kabupatenArea").html(html);
               $("#kecamatanArea").html('');
               $("#desaArea").html('');
            }
        }); 
    }
    function loadKecamatan(){
        var kabupaten = $("#kabupaten").val();
        $.ajax({
            type:'GET',
            url:"<?php echo $this->location('home/kecamatan'); ?>",
            data:"id=" + kabupaten,
            success: function(html){ 
                $("#kecamatanArea").html(html);
                $("#desaArea").html('');
            }
        }); 
    }
    function loadDesa(){
        var kecamatan = $("#kecamatan").val();
        $.ajax({
            type:'GET',
            url:"<?php echo $this->location('home/desa'); ?>",
            data:"id=" + kecamatan,
            success: function(html){ 
                $("#desaArea").html(html);
            }
        }); 
    }
</script>

<body>
    <h1 class="logo"><img alt="Logo" src="<?php echo $this->uri->baseUri;?>assets/img/logo.png" /></h1>
    <div id="konten">
        <h1>Wilayah Indonesia</h1>
        <p>
            Propinsi : 
                <select id="provinsi" onchange="loadKabupaten()">
                    <?php
                    foreach ($provinsi as $prov) {
                        echo "<option value='$prov->id'>$prov->nama</option>";
                    }
                    ?>
                </select>
        </p>
        <p id="kabupatenArea"></p>
        <p id="kecamatanArea"></p>
        <p id="desaArea"></p>
    </div>

    <div id="foot">
        Made in Bandung and powered by <a href="http://dika.web.id/">dika.web.id</a>, Created with <a href="http://panadaframework.com/">Panada</a> version 1.0.0-alfa
    </div>
    
    <a href="https://github.com/ferdhika31/wilayah-indo">
        <img src="<?php echo $this->uri->baseUri; ?>assets/img/forkgithub.png" style="position: absolute; top: 0; right: 0; border: 0;" alt="Fork me on GitHub">
    </a>

</body>
</html>