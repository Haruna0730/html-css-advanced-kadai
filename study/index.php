index.phpのファイル

<?php
echo
  'World' ;
?>

<?php
# コメント1
// コメント2  #より//の方がよく使われる
/*aaa複数行
 *iii
 *uuu
*/
?>

<?php
/* 変数の勉強 $
 * 変数とは、プログラム処理に利用するデータを格納しておく器（入れ物）
 */
?>
<title><?php $title='今日の晩御飯' ; ?></title>
<h1><?php echo $title 
//$titleで「今日の晩御飯」を指定しているから違う箇所で$titleを打つと指定された文字が表示される;
?></h1>

<?php
/* 配列の勉強 array()
 * 箱の中に仕切りがあって、複数のデータを入れることができる箱
 */
?>
<?php
$week = array('日','月','火','水','木','金','土') ;
?>
<?php
echo $week[date("w")] ;
echo "曜日" ;
// date() サーバーに日付を問い合わせて日付を取得する ;
?>
<br>
<?php echo
'↓画像の出し方（通常vr.）↓';
?>
<img src="<?php echo get_template_directory_uri(); ?>/image/vibrant-sunset.png" alt=""><br>
<?php echo
'↓画像の出し方（連想配列vr.）↓';
?>
<?php
$img = array(
  'uri' => '<img src="<?php echo get_template_directory_uri(); ?>/image/vibrant-sunset.png" alt="太陽"> ',
  'width' => '640',
  'height' => '480'
);
?>
<br><?php echo '上手くできなかった' ?>

<br>
<?php
//ifを利用した条件判定の勉強
?>
<?php
$hour = date('G');//G=現在時刻を変数に格納
if($hour < 10) :
  echo 'おはようございます';
elseif($hour < 16) :
  echo 'こんにちは';
elseif($hour < 20) :
  echo 'こんばんわ';
else :
  echo 'おやすみなさい';
endif;
?>

<?php
//whileを利用した繰り返し処理の勉強
?>
<P><?php
$month = 4 ;
$end = date('n');//n=現在の月
while($month <= $end){
  echo $month . '月';// . は追加を意味する
  $month++;//++は$monthの値を1増やす意味=今月も含む
}?>
</p>

<?php
//関数の勉強
?>
<p><?php
$today = date('y年n月j日g時');//date(どの書式で取得するか,いつの日付を取得するか)引数が一つの場合、現在の日付を指す
echo $today;
?></p>
<p><?php
$version = phpversion();//phpのバージョンを示す、引数()がない場合もある
echo $version . ' : phpのバージョン';
?></p>
<?php
function output_img_link($img){//自分で関数を作成する　function 関数名(引数名)｛
  echo '<img src="';
  echo $img;
  echo '">';
}
?>
<?php //output_img_link($img)を打つだけでよくなる
output_img_link('<?php echo get_template_directory_uri(); ?>/image/vibrant-sunset.png')
?>
<?php echo
"上手くできなかった２ 画像が出せない"
?>

<p><?php
    echo "インデント変えてみた";
    //下部のスペースから該当スペース数を選択、tabキーを使う
?></p>

<?php
    echo 3*3; //計算してみた
?>

<?php //オブジェクトの勉強（関数と変数バラバラVr.）
    function return_price(){
        global $date; //global = 変数名の前にglobalと付けると関数の外にある変数が使用できる
        if($date >= 20240201){
            $price = 1240;
        }else{
            $price = 1200;
        }
        return $price;
    }
?>
<p><?php
    $date = date('ymd');
    $price = return_price();
    echo $price;
?></p>
<?php
    class Price{
        protected $price;
        public $date;

        public function return_price(){
            if($this->date >= 20240201){
                $this->price = 1240;
            }else{
                $this->price = 1200;
            }
            return $this->price;
        }
    }
    $price = new Price;
    $price->date = date('ymd');
    echo $price->return_price();
?>