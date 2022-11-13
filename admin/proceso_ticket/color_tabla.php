
 <th id="fila" <?php
   if ($rowSql["status"] == 0) {
   echo"
   style = '
    -webkit-box-shadow: 2px 2px 5px #999 !important;
    background: #d9f73226 !important;
   '";
 }elseif ($rowSql["status"] == 1 ) {
   echo"
   style = '
  -webkit-box-shadow: 2px 2px 5px #999 !important;
        background-color: #20e9d242 !important;
   '";
 }elseif ($rowSql["status"] == 2 ) {
   echo"
   style = '
  -webkit-box-shadow: 2px 2px 5px #999 !important;
    background-color: #58ff4942 !important;
   '";
 }elseif ($rowSql["status"] == 3 ) {
   echo"
   style = '
  -webkit-box-shadow: 2px 2px 5px #999 !important;
        background-color: #58ff4942 !important;
   '";
 }elseif ($rowSql["status"] == 4 ) {
   echo"
   style = '
  -webkit-box-shadow: 2px 2px 5px #999 !important;
        background-color: #c7c6c7bf;
   '";
 }

 ?> >
