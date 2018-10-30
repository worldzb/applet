/*
 * This file is part of jinggangym <https://jinggangym.com/>* Copyright (C) 2006-2018.All rights reserved. 
 * @Author: worldzb 
 * @Date: 2018-08-20 15:45:11 
 * @Last Modified by: worldzb
 * @Last Modified time: 2018-08-23 13:59:29
 */ 
 

class Main{
    constructor()
    {
        let a=[4,1,1,2]
        let b=()=>[3,4];
        //b.push(...a);x    
        console.log(b);
    }

    test(...item){
        console.log(item[1]);
    }

    
}

export default Main;

