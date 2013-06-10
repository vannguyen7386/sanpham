
var App = {
   
    fn: {},
    fnBefore: {},
    fnAfter: {},
    baseURL: function(url){
        return baseURL + (url.match(/^\//i) ? '' : '/') + url;
    },
    register: function(name,fn){
        App.fn[name] = fn;
    },
    registerAfter: function(name,fn){
        App.fnAfter[name] = fn;
    },
    registerBefore: function(name, fn ){
        App.fnBefore[name] = fn;
    },
    
    render: function( elem ){ 
        
        for (var x in App.fnBefore) {
            App.fnBefore[x].call(elem); 
        }
        App.fnBefore = {};

        for (var x in App.fn) {
            App.fn[x].call(elem);
        }
        for (var x in App.fnAfter) {
            App.fnAfter[x].call(elem);
        }
        App.fnAfter = {};
    }
};


