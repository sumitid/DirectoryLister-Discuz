(function() {
    'use strict';
    
    // 检测IE浏览器
    function detectIE() {
        var ua = window.navigator.userAgent;
        var isIE = /*@cc_on!@*/false || !!document.documentMode;
        
        if (isIE) {
            var version = (function() {
                var re = /MSIE (\d+)/.exec(ua);
                if (re) return parseInt(re[1], 10);
                return 'unknown';
            })();
            
            document.documentElement.className += ' ie ie' + version + ' lte-ie' + version;
            
            if (version <= 9) {
                document.documentElement.className += ' lte-ie9';
            }
        }
        
        return isIE;
    }
    
    // 主题切换
    function initThemeToggle() {
        // 获取保存的主题
        var savedTheme = localStorage.getItem('discuz_theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);
        
        // 创建切换按钮
        var wrapper = document.createElement('div');
        wrapper.className = 'theme-switch-wrapper';
        wrapper.innerHTML = '<button class="theme-switch-btn" id="themeToggleBtn"><i class="fa fa-' + 
            (savedTheme === 'light' ? 'moon-o' : 'sun-o') + '"></i> ' + 
            (savedTheme === 'light' ? '夜间模式' : '日间模式') + '</button>';
        document.body.appendChild(wrapper);
        
        // 绑定点击事件
        document.getElementById('themeToggleBtn').onclick = function() {
            var currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
            var newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('discuz_theme', newTheme);
            
            this.innerHTML = '<i class="fa fa-' + 
                (newTheme === 'light' ? 'moon-o' : 'sun-o') + '"></i> ' + 
                (newTheme === 'light' ? '夜间模式' : '日间模式');
        };
    }
    
    // 为搜索引擎添加欢迎标记
    function welcomeSpiders() {
        var ua = navigator.userAgent;
        var spiders = ['Baidu', 'Google', 'bing', 'Sogou', '360', 'Yandex', 'Bot'];
        var isSpider = false;
        
        for (var i = 0; i < spiders.length; i++) {
            if (ua.indexOf(spiders[i]) > -1) {
                isSpider = true;
                break;
            }
        }
        
        if (isSpider) {
            var footer = document.querySelector('.footer');
            if (footer) {
                var span = document.createElement('span');
                span.style.color = '#FFD700';
                span.innerHTML = ' | 欢迎搜索引擎来访';
                footer.appendChild(span);
            }
        }
    }
    
    // 初始化
    document.addEventListener('DOMContentLoaded', function() {
        detectIE();
        initThemeToggle();
        welcomeSpiders();
    });
    
})();