<?php $html->css("form",null,array(),false); ?>

<div id="login_box" class="grid_12 prefix_2">
    <div class="top"></div>
    <div class="middle">
        <div id="logbox_l" class="grid_6 suffix_1 alpha">
            <div class="spacer">
                <h2 id="login">Login <span>dengan akun Javan Anda.</span></h2>
                <?php echo $form->create('User', array('url' => array('controller' => 'users', 'action' =>'login'),"class"=>"login"));?>
                <fieldset>
                    <ol>
                        <li><?php echo $form->input('User.username', array("class"=>"inputLogin"));?></li>
                        <li><?php echo $form->input('User.password', array("class"=>"inputLogin"));?></li>
                        <li class="buttons">
                            <label class="ghost"></label>
                            <button type="submit" class="button"><?php echo $html->image("icon/key.png") ?> Login</button>
                        </li>

                    </ol>

                </fieldset>
                </form>

                <div class="ket">
                    Untuk sementara proses registrasi hanya bisa dilakukan oleh Administrator. Jika Anda merasa berhak mendapat akun Javan, silakan hubungi admin[at]javan.web.id.
                </div>
            </div>
        </div>
        <div id="logbox_r" class="grid_5 omega"><div class="spacer">
            <div class="grid_5  alpha omega domino">
                <div class="grid_1 alpha ar sym"><?php echo $html->image('worklog.png') ?></div>
                <div class="grid_4 omega desc">
                    <p>
                        <h4>Worklog</h4>
                        memastikan Anda <br /> berada di jalur yang benar.
                    </p>
                </div>
            </div>

            <div class="grid_5  alpha omega domino">
                <div class="grid_1 alpha ar sym"><?php echo $html->image('share_folder.png') ?></div>
                <div class="grid_4 omega desc">
                    <p>
                        <h4>Berbagi dokumen</h4>
                        antara Anda dengan anggota tim<br />dan memantau perubahannya.
                    </p>
                </div>
            </div>
            <div class="grid_5  alpha omega domino">
                <div class="grid_1 alpha ar sym"><?php echo $html->image('money.png') ?></div>
                <div class="grid_4 omega desc">
                    <p>
                        <h4>Transparansi Keuangan</h4>
                        dari setiap transaksi yang terjadi<br /> dalam organisasi.
                    </p>
                </div>
            </div>
            <div class="grid_5  alpha omega domino">
                <div class="grid_1 alpha ar sym"><?php echo $html->image('graph.png') ?></div>
                <div class="grid_4 omega desc">
                    <p>
                        <h4>Laporan</h4>
                        berbagai macam aspek<br /> dalam organisasi.
                    </p>
                </div>
            </div>

        </div></div>
        <div class="clear"></div>
    </div>
    <div class="bottom"></div>
</div>
