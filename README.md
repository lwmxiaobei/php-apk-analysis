# php-apk-analysis

一款解析安卓apk包信息的工具包，可以提取应用名、包名、版本号等关键信息。

## 功能特性

- 提取 APK 应用名称
- 提取 APK 包名
- 提取 APK 版本名称和版本号
- 提取 APK 最低 SDK 版本要求
- 简单易用的 API

## 环境要求

- PHP >= 5.4
- aapt (Android Asset Packaging Tool)

## 安装

### 安装 aapt

aapt 是 Android SDK 中的一个工具，用于解析 APK 信息。您需要先安装 Android SDK 或单独安装 aapt，并将其加入环境变量中。

### 安装 php-apk-analysis

使用 Composer 安装：

```bash
composer require linweimin/php-apk-analysis
```

或者在 `composer.json` 中添加：

```json
{
    "require": {
        "linweimin/php-apk-analysis": "^1.0"
    }
}
```

然后运行：

```bash
composer install
```

## 使用方法

```php
<?php
require "vendor/autoload.php";

use Lwm\Apk\Analysis;

// 创建分析实例
$apkAnalysis = new Analysis();

// 指定 APK 文件路径
$file = "path/to/your/app.apk";

// 分析 APK 文件
if ($apkAnalysis->analyzing($file)) {
    // 获取 APK 信息
    $apkInfo = $apkAnalysis->getApkInfo();
    var_dump($apkInfo);
} else {
    echo "APK 分析失败";
}
```

### 返回数据格式

```php
[
    'packageName' => 'com.example.app',
    'appName'     => '示例应用',
    'versionName' => '1.0.0',
    'versionCode' => '1'
]
```

## 注意事项

1. 确保 aapt 已正确安装并加入环境变量
2. 确保 PHP 进程有权限执行 exec 函数
3. 确保 PHP 进程有权限读取 APK 文件

## 许可证

MIT License

## 作者

xiaobei - 806641926@qq.com