==========================================
Vue数据双向绑定
==========================================
<div id="app">
	<h1>{{message}}</h1>
	<input type="text" v-model="message">
	<pre>
		{{$date|json}}
	</pre>
</div>
<script src="vue.min.js"></script>
<script>
	new Vue({
		el: '#app',
		data:{
			message:"Hello World!"
		}
	});
</script>
==========================================
Vue元素条件显示
==========================================
<div id="app">
	<form action="path/to/post" method="post">
		<h1 class="error" v-show="!message">you must enter a message</h1>
		<!-- <h1 class="error" v-if="!message">you must enter a message</h1> -->
		<input type="text" v-model="message">
		<button type="submit" v-show="message">
	</form>
	<pre>
		{{$date|json}}
	</pre>
</div>
<script src="vue.min.js"></script>
<script>
	new Vue({
		el: '#app',
		data:{
			message:""
		}
	});
</script>
==========================================
note:
v-show成立添加display:hidden样式
v-if成立删除DOM元素
v-else 元素必须立即跟在 v-if 或 v-show 元素的后面——否则它不能被识别。
==========================================
Vue元素事件
==========================================
<div id="app">
	<button type="button" @click="count + 1">submit {{count}}</button>
	<button type="button" @click="addCount">submit {{count}}</button>
</div>
<script src="vue.min.js"></script>
<script>
	new Vue({
		el: '#app',
		data:{
			count:0
		}
		methods:{
			addCount:function(){
				this.count+=1;
			},
			doSomething: function(){
				//my code
			}
		}
	});
</script>

<div v-for="item in items" @onclick="print(item)"></div>

<script src="vue.min.js"></script>
<script>
	new Vue({
		el: '#app',
		data:{
			items:[
				{name:"zzh"},
				{name:"master"}
			]
		}
		methods:{
			print:function(item){
				console.info(item.name);
			}
		}
	});
</script>
==========================================
样式绑定
==========================================
<li v-bind:class="['class-a',tabIndex==$index?'cur':'']">
<li :class="['class-a',tabIndex==$index?'cur':'']">
==========================================
for循环
==========================================
<li v-for="item in items" v-bind:class="['class-a',tabIndex==$index?'cur':'']">
==========================================
自定义标签
==========================================

<div id="app">
	<!-- 绑定tasks变量到list -->
	<task-app :list='tasks'></task-app>

	<template id="task-template">
		<!-- 循环list中的tasks变量并输出 -->
		<div v-for="task in list">{{task.name}}</div>
	</template>
</div>

<script>
	Vue.component('task-app',{//填自定义入标签
		template:'#task-template',//填入指定模板
		props:['list']//填入自定义属性
	})
	new Vue({
		el:"#app",//指定vue对象
		data:{
			tasks:[
				{name:"zzh"},
				{name:"master"}
			]
		}
	});
</script>
==========================================
vue+jquery+laravel ->ajax获取数据
==========================================
html代码
==========================================
<div id="app" style="font-size: 16px;height: 10px;background: #fff;">
    <task-app></task-app>

    <template id="task-template">
        <div v-for="task in list">@{{task.title}}</div>
    </template>
</div>
<script src="http://cdn.bootcss.com/vue/1.0.26-csp/vue.js"></script>
<script src="http://cdn.bootcss.com/jquery/2.0.2/jquery.min.js"></script>

<script>
    Vue.component('task-app',{
        template:'#task-template',
        data:function(){
            return {
                list:[]
            }
        },
        created:function(){
            var vm=this;
            $.getJSON('http://localhost:8003/test', function(data){
                vm.list=data;
            })
        }
    })
    new Vue({
        el:"#app"
    });
</script>
==========================================
laravel api代码
==========================================
Route::get('/vue', function () {
    return view('vue');
});
Route::get('/test', function () {
    $banners = \App\Banner::get();
    return $banners;
});
==========================================
vue+vue-resource+laravel ->ajax获取数据
==========================================
html代码
==========================================
<div id="app" style="font-size: 16px;height: 10px;background: #fff;">
    <task-app></task-app>

    <template id="task-template">
        <div v-for="task in list">@{{task.title}}</div>
    </template>
</div>
<script src="http://cdn.bootcss.com/vue/1.0.26-csp/vue.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/1.0.2/vue-resource.min.js"></script>

<script>
    Vue.component('task-app',{
        template:'#task-template',
        data:function(){
            return {
                list:[]
            }
        },
        created:function(){
            var vm=this;
            // 这里可以先console.log(response)看下返回结构
            this.$http.get('http://localhost:8003/test').then((response) => {
            // 成功代码
                vm.list = response.data;
            }, (response) => {
            // 失败代码
                console.info("error");
            });
        }
    })
    new Vue({
        el:"#app"
    });
</script>
******************************************
<div id="app" style="font-size: 16px;height: 10px;background: #fff;">
    <task-app></task-app>

    <template id="task-template">
        <div v-for="task in list">@{{task.title}}</div>
    </template>
</div>
<script src="http://cdn.bootcss.com/vue/1.0.26-csp/vue.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/1.0.2/vue-resource.min.js"></script>

<script>
    Vue.component('task-app',{
        template:'#task-template',
        data:function(){
            return {
                list:[]
            }
        },
        created:function(){
            var vm=this;
            //0.6版本请求
            this.$http.get('http://localhost:8003/test', function(data){
                vm.list=data;
            })
        }
    })
    new Vue({
        el:"#app"
    });
</script>
==========================================
Laravel API代码
==========================================
Route::get('/vue', function () {
    return view('vue');
});
Route::get('/test', function () {
    $banners = \App\Banner::get();
    return $banners;
});
==========================================
vue-resource 请求方法
==========================================
get(url, [options])
head(url, [options])
delete(url, [options])
jsonp(url, [options])
post(url, [body], [options])
put(url, [body], [options])
patch(url, [body], [options])
==========================================
vue+vue-resource+laravel ->ajax添加数据
==========================================
html代码
==========================================
<head>
    <meta id="token" name="token" value="{{ csrf_token() }}">
</head>

<div id="app" style="font-size: 16px;height: 10px;background: #fff;">

    <task-app></task-app>

    <template id="task-template">
        <form @submit="createBanner">
            <input type="text" v-model="note">
            <button type="submit" >create</button>
        </form>
        <div v-for="task in list | orderBy 'id' -1">@{{task.title}}</div>
    </template>
</div>
<script src="http://cdn.bootcss.com/vue/1.0.26-csp/vue.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.6.1/vue-resource.min.js"></script>

<script>
    Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
    // Vue 自定义标签
    Vue.component('task-app',{
        // 自定义标签填充内容
        template:'#task-template',

        data:{
                note:'',
                list:[]
        },
        created:function(){
            var vm=this;
            // 方法1
            vm.$http.get('http://localhost:8003/test', function(data){
                vm.list=data;
            })

            // 方法2 这里可以先console.log(response)看下返回结构
            // this.$http.get('http://localhost:8003/test').then((response) => {
            // 成功代码
            //     vm.list = response.data;
            // }, (response) => {
            // 失败代码
            //     console.info("error");
            // });
        },
        methods:{
            createBanner:function (e) {
                e.preventDefault();
                this.$http.post('http://localhost:8003/test', {title:this.note}, function (respones) {
                    this.list.push(respones.banner);
                }.bind(this))
            }
        }
    })
    // Vue 作用域
    new Vue({
        el:"#app"
    });
</script>
==========================================
Vue Event
==========================================
abort           图像的加载被中断。
blur            元素失去焦点。
change          域的内容被改变。
click           点击某个对象时的事件句柄。
dblclick        双击某个对象时的事件句柄。
error           在加载文档或图像时发生错误。
focus           元素获得焦点。
keydown         某个键盘按键被按下。
keypress        某个键盘按键被按下并松开。
keyup           某个键盘按键被松开。
load            一张页面或一幅图像完成加载。
mousedown       鼠标按钮被按下。
mousemove       鼠标被移动。
mouseout        鼠标从某元素移开。
mouseover       鼠标移到某元素之上。
mouseup         鼠标按键被松开。
reset           重置按钮被点击。
resize          窗口或框架被重新调整大小。
select          文本被选中。
submit          确认按钮被点击。
unload          用户退出页面。
==========================================