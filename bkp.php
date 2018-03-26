<?php
session_start();
include_once '../include/header.php';
?>

<body>
    <div>
        <fieldset>
            <legend><b>Complete Database Backup</b></legend><br />
            <table class="bodytext" width="100%">
                <tr>

                    <td align="center" style="valign:middle;" >
                        <form name=frm method=post action="bkp.php?f=1">
                            <input type="submit" name="submit" value="Complete Database Backup" title="Click here to complete database backup"/>
                        </form>
                        <?php
                        if ($_GET['f'] == 1) {
                            $dbname = 'cbf_fzd';
                            $dbuser = 'root';
                            $dbpass = '';
                            $dbhost = 'localhost';

                            if (!file_exists('D://dak_backup')) {
                                mkdir('D:/dak_backup');
                            }

                            $date = date('dmY_His', time());
                            $dbbackup = 'D://dak_backup/' . $date . ".sql";

//$command = "\"C:\\Program Files\\xampp\\mysql\\bin\\mysqldump.exe\" --opt --skip-extended-insert --complete-insert --host=localhost --user=root --password=root123 cb_cms > backup/backup.sql";
//$command = "\"C:\\Program Files\\xampp\\mysql\\bin\\mysqldump.exe\" --opt --host=localhost --user=root --password=root123 cb_cms > backup/backup.sql";
                            $command = "\"C:\\xampp\\mysql\\bin\\mysqldump.exe\" --opt --skip-extended-insert --complete-insert  --host=" . $dbhost . " --user=" . $dbuser . " --password=" . $dbpass . " cbf_fzd cb_user dak_no cb_recpt_dgpd cb_recpt dak_rece_cantt cb_dispatch section>" . $dbbackup;
                            exec($command, $output = array(), $worked);

                            switch ($worked) {
                                case 0:
                                    echo '<font color=#000>Backup Completed. File Name :<b>' . $date . '.sql </b> successfully created in <b> D:/dak_backup folder</b></font>';
                                    break;
                                case 1:
                                    echo '<font color=#f0F>There was a warning during the Backup of <b> files </b></font>';
                                    break;
                                case 2:
                                    echo '<font color=#f00>There was an error during backup</font>';
                                    break;
                            }
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>

</body>