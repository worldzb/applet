<template>
    <div class="add">
        <br>
        <form method="POST" @submit.prevent="onSubmit" id='client'>
            <input type="hidden" name="id">
            <div class="form-group row">
                <label class="col-xs-4 col-form-label">添加时间<span class="required"> *</span></label>
                <div class="col-xs-8">
                    <input required name="add_date" type="date" class="form-control"  placeholder="年月日" v-model="cc.client_add_date">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-4 col-form-label">网咨 <span class="required"> *</span></label>
                <div class="col-xs-8">
                    <input type="hidden" name="counselor">
                    <select required name="counselor" id="inputState" class="form-control" placeholder="网咨" v-model="cc.client_counselor">
                        <option selected> </option>
                        <option v-for="(item,index) in addList.counselor">{{item}}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xs-4 col-form-label">添加平台 <span class="required"> *</span></label>
                <div class="col-xs-8">
                    <input type="hidden" name="platform">
                    <select name="platform" required id="inputState" class="form-control" placeholder="添加平台" v-model="cc.client_platform">
                        <option selected> </option>                                  
                        <option v-for="(item,index) in addList.platform">{{item}}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xs-4 col-form-label">地区 <span class="required">*</span></label>
                <div class="col-xs-8">
                    <input type="hidden" name="account">
                    <select name="account" required id="inputState" class="form-control" v-model="cc.client_account">
                        <option selected> </option>
                        <option v-for="(item,index) in addList.account">{{item}}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xs-4 col-form-label">客户姓名 <span class="required">*</span></label>
                <div class="col-xs-8">
                    <input name="name" required type="text" class="form-control" id="inputPassword" placeholder="客户姓名" v-model="cc.client_name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-4 col-form-label">性别 <span class="required">*</span></label>
                <div class="col-xs-8">
                    <input type="hidden" name="gender">
                    <select name="gender" required id="inputState" class="form-control" v-model="cc.client_gender">
                        <option selected> </option>
                        <option>男</option>
                        <option>女</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xs-4 col-form-label">电话 <span class="required">*</span></label>
                <div class="col-xs-6">
                    <input id="phone" required name="phone" type="number" class="form-control" placeholder="电话" v-model='cc.client_phone' @blur="checkoutPhone()">
                </div>
                <div class="col-xs-2">
                    <button type="button" 
                    class="btn btn-default"
                        @click="autoFillPhone()"
                        data-toggle="tooltip" 
                        title="只有在没有电话时才能点击，点击将会生成一个固定格式的随机电话!">
                        <i class="fa fa-random"></i>
                    </button>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xs-4 col-form-label">微信/QQ</label>
                <div class="col-xs-8">
                    <input name="wechat_qq" type="text" class="form-control" placeholder="微信/QQ" v-model='cc.client_wechat_qq'>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-4 col-form-label">咨询项目 <span class="required">*</span></label>
                <div class="col-xs-8">   
                    <input type="hidden" name="consult_project">          
                    <select required name="consult_project" id="inputState" class="form-control" placeholder="咨询项目" v-model="cc.client_consult_project">
                        <option selected> </option>
                        <option v-for="(item,index) in addList.consult_project">{{item}}</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-4 col-form-label">派单级别 <span class="required">*</span></label>
                <div class="col-xs-8">
                    <input type="hidden" name="orders_level">
                    <select required name="orders_level" id="inputState" class="form-control" v-model="cc.client_orders_level">
                        <option selected></option>
                        <option title="加微信，可正常沟通">A</option>
                        <option title="加微信 没通过(新氧：没加微信)">B</option>
                        <option title="没加微信">C</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-xs-4 col-form-label">客户类型/人数  <span class="required">*</span></label>

                <div class="col-xs-4">
                    <input type="hidden" name="visit_type">
                    <select name="visit_type" 
                    class="form-control" 
                    required
                    id="inputPassword" placeholder="到诊类型" 
                    v-model="cc.client_visit_type"
                    @change="judgeClientType()">
                        <option selected> </option>
                        <option v-for="(item,index) in addList.visit_type">{{item}}</option>
                    </select>
                </div>
                <div class="col-xs-4">
                    <input name="visit_numbers" 
                        type="number" 
                        class="form-control" 
                        placeholder="到诊客户人数" 
                        v-model="cc.client_visit_numbers"
                        readonly="true"
                        v-if="cc.client_visit_type!='其它' && cc.client_visit_type!='复诊'">
                    <input name="visit_numbers" 
                        type="number" 
                        class="form-control" 
                        placeholder="到诊客户人数" 
                        v-model="cc.client_visit_numbers"
                        v-else>
                </div>
            </div>

            <div class="foldList" id="foldList-extendMenu">
                <div class="foldList-header">
                    扩展表单
                    <i class="foldList-angle">+</i>
                </div>
                <div class="foldList-body" style="padding: 15px; background:#eee">

                    <div class="form-group row">
                        <label class="col-xs-4 col-form-label">成交类型</label>
                        <div class="col-xs-8">
                            <input type="hidden" name="bargain_type">
                            <select name="bargain_type" class="form-control" placeholder="成交类型" v-model='cc.client_bargain_type'>
                                <option selected> </option>
                                <option>成交</option>
                                <option>定金</option>
                                <option>其它</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-xs-4 col-form-label">
                            现场咨询<span class="required" v-if="requiredSwitch.client_locale_consult">*</span> 
                        </label>
                        <div class="col-xs-8">
                            <input type="hidden" name="locale_consult">
                            <select name="locale_consult" 
                                class="form-control" 
                                placeholder="现场咨询" 
                                v-model='cc.client_locale_consult'
                                :required="requiredSwitch.client_locale_consult">
                                <option selected> </option>
                                <option v-for="(item,index) in addList.locale_consult">{{item}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xs-4 col-form-label">金额</label>
                        <div class="col-xs-8">
                            <input name="down_payment" type="number" class="form-control" placeholder="预收定金/单位:RMB" v-model="cc.client_down_payment">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-4 col-form-label">预约时间</label>
                        <div class="col-xs-8">
                            <input name="appointment_date" type="date" class="form-control"  placeholder="年月日" v-model="cc.client_appointment_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-4 col-form-label">到诊时间</label>
                        <div class="col-xs-8">
                            <input name="visit_date" type="date" class="form-control"  placeholder="年月日" v-model="cc.client_visit_date">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-xs-4 col-form-label">回访时间</label>
                <div class="col-xs-8">
                    <input name="return_visit_date" type="date" class="form-control" placeholder="年月日" v-model="cc.client_return_visit_date">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-sm-12">
                    <textarea name="remarks" 
                    required rows="3" 
                    style="width: 100%;resize:none" 
                    v-model="cc.client_remarks"
                    placeholder="备注">
                    </textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type='submit' class="btn btn-primary btn-block" @click="submit()">提交</button>
            </div>
        </form>
    </div>
</template>
<script>
import addList from './../../config/add-list.js';
import client from './client.js';
import {mapGetters,mapMutations} from 'vuex';


export default {
    data(){
        return {
            cc:client,
            addList:addList,
            requiredSwitch:{},
        }
    },
    methods:{
        //form 表单提交事件
        onSubmit(){
            let params={};
            for (const key in this.cc) {
                if (this.cc.hasOwnProperty(key)) {
                    let keyTemp=key;
                    keyTemp=keyTemp.replace('client_','');
                    params[keyTemp]=this.cc[key];
                }
            }
            axios.post('addClient',params).then(()=>{
                
            });
            return false;
        },
        submit(){

        },
        //检查电话是否已经存在
        checkoutPhone: function () {
            if ($('#phone').val() == "" || $('#phone').val() == undefined) {
                return;
            }
            let that = this;
            axios.get('checkoutPhone', {
                params: {
                    phone: $('#phone').val()
                }
            }).then(function ($res) {
                if ($res.data.length > 0 && that.mtTitle == "数据添加") {
                    //alert('数据已存在');
                    that.repetData=$res.data;
                    that.cc.client_phone="";
                }else{
                    that.repetData=false;
                }
            });
        },
        //判断客户类型
        judgeClientType:function(){
            if(	this.cc.client_visit_type=="初诊" 
                ||this.cc.client_visit_type=="再消费"
                ||this.cc.client_visit_type=="复诊"
            ){
                $('#foldList-extendMenu').addClass('foldList-active');
                this.requiredSwitch.client_locale_consult='required'
                this.cc.client_visit_numbers=1;
            }else {
                $('#foldList-extendMenu').removeClass('foldList-active');
                this.requiredSwitch.client_locale_consult=false;
                this.cc.client_visit_numbers=0;
            }
            $('[data-toggle="tooltip"]').tooltip();//初始化提示插件
        },
        //电话不存在时自动填写
        autoFillPhone:function(){
            let str="0"+Date.parse(new Date());
            this.$set(this.cc,'client_phone',str.substr(0,11));
        },
    }
}
</script>

<style lang="scss" scoped type="text/css">
    .required{
        color:red;
    }
    input,select{
        border:none
    }
    .form-group{
        border-bottom:1px solid #fff;
    }
</style>
