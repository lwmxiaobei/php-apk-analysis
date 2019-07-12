<?php
namespace Lwm\Apk;
/**
 * Created by PhpStorm.
 * User: linweimin
 * Date: 2019-07-12
 * Time: 10:51
 */
class Analysis
{
    /**
     * 包名
     * @var
     */
    public $packageName;

    /**
     * 应用名
     * @var
     */
    public $appName;

    /**
     * 版本名
     * @var
     */
    public $versionName;

    /**
     * 版本号
     * @var
     */
    public $versionCode;

    /**
     * 最低SDK版本
     * @var
     */
    public $minSdkVersion;

    /**
     * 解析apk包
     *
     * @param $file
     *
     * @return bool
     */
    public function analyzing($file)
    {
        if (!is_file($file)) {
            return false;
        }
        $command = 'aapt dump badging ' . $file;
        exec($command, $out, $return);

        if($return == 0) {
            $str = '';
            foreach($out as $val) {
                $str .= $val;
            }

            $pattern = "/application: label='(.*)'/isU";
            $this->appName = preg_match($pattern, $str, $m) ? $m[1] : '';

            $pattern = "/package: name='(.*)'/isU";
            $this->packageName = preg_match($pattern, $str, $m) ? $m[1] : '';

            //兼容apk打包工具不一致导致解析的label字段值不一致问题
            if (empty($this->appName)) {
                $pattern = "/  label='(.*)'/isU";
                $this->packageName = preg_match($pattern, $str, $m) ? $m[1] : '';
            }

            $pattern = "/versionName='(.*)'/isU";
            $this->versionName = preg_match($pattern, $str, $m) ? $m[1] : '';

            $pattern = "/versionCode='(.*)'/isU";
            $this->versionCode = preg_match($pattern, $str, $m) ? $m[1] : '';

            $pattern = "/sdkVersion:'(.*)'/isU";
            $this->minSdkVersion = preg_match($pattern, $str, $m) ? $m[1] : '';

            return true;
        }


        return false;
    }


    /**
     * 获取apk信息
     * @return array
     */
    public function getApkInfo()
    {
        $apkInfo = [
            'packageName' => $this->packageName,
            'appName' => $this->appName,
            'versionName' => $this->versionName,
            'versionCode' => $this->versionCode,
        ];

        return $apkInfo;
    }
}