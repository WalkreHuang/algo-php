# 刷题秘籍
  
## 算法题解步骤 
  
### 第一步 
审题（5~10分钟）
   * 有思路，先列出可能的解法，再选出最优解，写完AC，并查看最优题解。
   * 无思路，直接看题解
      * 默写背诵，最后闭卷写
### 第二步
去到国际站，查看其他优质解
***
## 递归题解法

### 思维要点
* 不要人肉递归（画递归树）
* 找最近最简方法，将问题拆解成可重复解决的子问题
* 数学归纳法(找出递推公式)

### 代码模板
* 递归终止条件
* 逻辑代码(将递推公式翻译成代码)
* 进入下一层
* 清理工作（可选）
```angular2
public function recursive($level, $param) 
{
    //terminator
    if ($level > MAX_LEVEL) {
        return;    
    }
    
    //process current logic
    process($level, $param);
    
    //drill down
    recursive($level+1, $new_param);
    
    //restore current status
}
```