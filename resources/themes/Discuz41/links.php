<div class="friend-links">
    <div class="friend-links-title">
        <i class="fa fa-link"></i> 友情链接
    </div>
    <div class="friend-links-content">
        <a href="#" target="_blank">GitHub</a>
        <a href="https://www.kangle.one" target="_blank">Kangle</a>
        <a href="https://host.zhuji.one" target="_blank">免费空间</a>
        <a href="https://www.tupian.im" target="_blank">图片图床</a>
        <a href="https://www.google.com" target="_blank">google</a>
        <a href="https://www.bing.com" target="_blank">必应</a>        
        <a href="#" target="_blank"></a>
    </div>
</div>

<style>
    .friend-links {
        background: #f0f5fd;
        border: none;
        border-radius: 8px;
        margin-top: 5px;
        margin-bottom: 5px;
        overflow: hidden;
        height: 45px;
        display: flex;
        align-items: center;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .friend-links-title {
        background: linear-gradient(to bottom, #3d6d9e 0%, #1e4a7a 100%);
        color: white;
        padding: 0 20px;
        height: 100%;
        display: flex;
        align-items: center;
        font-weight: bold;
        white-space: nowrap;
        font-size: 14px;
    }
    
    .friend-links-title i {
        margin-right: 5px;
        color: white;
    }
    
    .friend-links-content {
        flex: 1;
        padding: 0 15px;
        overflow-x: auto;
        white-space: nowrap;
        scrollbar-width: thin;
        scrollbar-color: #3d6d9e #f0f5fd;
    }
    
    .friend-links-content::-webkit-scrollbar {
        height: 4px;
    }
    
    .friend-links-content::-webkit-scrollbar-track {
        background: #f0f5fd;
    }
    
    .friend-links-content::-webkit-scrollbar-thumb {
        background: #3d6d9e;
        border-radius: 2px;
    }
    
    .friend-links-content a {
        color: #1e4a7a;
        text-decoration: none;
        margin-right: 20px;
        font-size: 13px;
        display: inline-block;
        line-height: 45px;
        transition: color 0.2s;
    }
    
    .friend-links-content a:hover {
        color: #0d3a6f;
        text-decoration: underline;
    }
    
    .friend-links-content a:last-child {
        margin-right: 0;
    }
    
    @media (max-width: 768px) {
        .friend-links {
            height: auto;
            flex-direction: column;
        }
        
        .friend-links-title {
            width: 100%;
            justify-content: center;
            padding: 8px 0;
        }
        
        .friend-links-content {
            padding: 8px 15px;
            text-align: center;
            white-space: normal;
        }
        
        .friend-links-content a {
            line-height: 30px;
            margin: 0 10px 5px;
        }
        
        .friend-links-content a:last-child {
            margin-right: 10px;
        }
    }
    
    @media (max-width: 480px) {
        .friend-links-content a {
            margin: 0 8px 5px;
            font-size: 12px;
        }
    }
</style>