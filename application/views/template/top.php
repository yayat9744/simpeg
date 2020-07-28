<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" onclick="get_notif_on_top();">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge jml_notif"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="area-notifikasi">

      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
<audio id="sound_notif" src="<?= base_url(); ?>aset/sound/my_sound_02.mp3" type="audio/mp3"></audio>

<script>
  get_jml_notif_on_top();

  setInterval(() => {
    cek_berkala_jatuh_tempo();
    get_jml_notif_on_top();
  }, 3000);

  function get_jml_notif_on_top() {
    $.ajax({
      url: "<?= base_url(); ?>notifikasi/jml_notif",
      type: "GET",
      cache: false,
      success: function(res) {
        if (res.status) {
          if (res.jumlah > 0 && res.jumlah < 10) {
            $(".jml_notif").html(res.jumlah);
          } else if (res.jumlah > 10) {
            $(".jml_notif").html("9+");
          } else {
            $(".jml_notif").html("");
          }
        } else {
          toastr.error(res.pesan);
        }
      },
      error: function() {
        toastr.error("400");
      }
    });
  }

  function get_notif_on_top() {
    $.ajax({
      url: "<?= base_url(); ?>notifikasi/get_list_notif_on_top",
      type: "GET",
      cache: false,
      success: function(res) {
        $("#area-notifikasi").html(res);
      },
      error: function() {
        toastr.error("400");
      }
    });
  }

  function cek_berkala_jatuh_tempo() {
    var audio = document.getElementById('sound_notif');
    $.ajax({
      url: "<?= base_url(); ?>notifikasi/cek_berkala_jatuh_tempo",
      type: "GET",
      cache: false,
      success: function(res) {
        if (res.status) {
          audio.play();
          toastr.success(res.pesan);
        } else {
          // toastr.error(res.pesan);
        }
      },
      error: function() {
        toastr.error("400");
      }
    });
  }
</script>