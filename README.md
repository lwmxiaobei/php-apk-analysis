# php-apk-analysis
一款解析安卓apk包信息的工具包，包括应用名，包名，版本号等
### 安装
- 需先安装aapt, 并加入到环境变量中，aapt命令是android SDK 中的一个工具，可以解析apk信息
- composer require linweimin/php-apk-analysis dev-master

### 使用

```
require "verdon/autoload.php";

use Lwm\Apk\Analysis;

$apkAnalusis = new Analysis();

$file = "main.apk";
$apkAnalusis->analyzing($file);
$apkInfo = $apkAnalusis->getApkInfo();
var_dump($apkInfo);

```


