<?php
/**
 *
 * User: huangwalker
 * Date: 2020/6/10
 * Time: 9:47
 * Email: <huangwalker@qq.com>
 */

//随机访问
class RandomAlgo
{
    //要负载的服务器
    private static $servers = [
        "192.168.1.2",
        "192.168.1.3",
        "192.168.1.4",
        "192.168.1.5",
    ];


    public function run()
    {
        $server_map = [];

        for ($i=0;$i< 100000;$i++) {
            $server = $this->random();

            $count = $server_map[$server] ?? null;
            if ($count == null) {
                $count = 1;
            } else {
                $count++;
            }

            $server_map[$server] = $count;
        }

        //请求分发的结果
        foreach ($server_map as $server => $count) {
            echo sprintf("IP:%s,次数:%d", $server, $count).PHP_EOL;
        }
    }

    /**
     * 获取一台随机服务器
     * @return mixed
     * @author clh
     * @time 2020/6/10
     */
    private function random()
    {
        $randomIndex = mt_rand(0, count(self::$servers)-1);

        return self::$servers[$randomIndex];
    }
}

$obj = new RandomAlgo();
$obj->run();