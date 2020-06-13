<?php
/**
 *
 * User: huangwalker
 * Date: 2020/6/10
 * Time: 10:57
 * Email: <huangwalker@qq.com>
 */

//加权轮询
class WeightPollAlgo
{
    //要负载的服务器,权值越大，访问概览越高
    private static $servers = [
        "192.168.1.2" => 2,
        "192.168.1.3" => 2,
        "192.168.1.4" => 2,
        "192.168.1.5" => 4,
    ];

    //记录当前服务器的下标，便于轮询
    private static $serverIndex = 0;

    public function run()
    {
        $server_map = [];

        for ($i=0;$i< 100000;$i++) {
            $server = $this->randomOneByOneWithWeight();

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
     * 加权轮询获取服务器
     * @return mixed
     * @author clh
     * @time 2020/6/10
     */
    private function randomOneByOneWithWeight()
    {
        //根据权值构造一个新的服务器数组
        $tmp_servers = [];
        foreach (self::$servers as $server => $weight) {
            for ($i=0;$i<$weight;$i++) {
                $tmp_servers[] = $server;
            }
        }

        self::$serverIndex++;
        if (self::$serverIndex == count($tmp_servers)) {
            self::$serverIndex = 0;
        }

        $server = $tmp_servers[self::$serverIndex];
        return $server;
    }
}

$obj = new WeightPollAlgo();
$obj->run();