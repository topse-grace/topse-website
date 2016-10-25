/**
 * Created by msyk on 14/12/29.
 *
 */

INTERMediatorOnPage.doBeforeConstruct = function () {
    "use strict";
    INTERMediator.titleAsLinkInfo = false;
    var wrapNode, node, bodyNode, i, colnode, firstLevelChildren;
    var language = "en";

    var urlComp = window.location.href.split("/");
    for (i = urlComp.length - 1; i >= 0; i--) {
        if (urlComp[i].length < 3 && urlComp[i].length > 0) {
            language = urlComp[i];
            break;
        }
    }
    INTERMediator.addCondition("pagebuilder", {field: "language", operator: "=", value: language});
    INTERMediator.addCondition("newslist", {field: "language", operator: "=", value: language});

    bodyNode = document.getElementsByTagName("body")[0];
    bodyNode.setAttribute("data-im-control", "enclosure");
    firstLevelChildren = [];
    while (bodyNode.childNodes.length > 0) {
        firstLevelChildren.push(bodyNode.childNodes[0]);
        bodyNode.removeChild(bodyNode.childNodes[0]);
    }
    wrapNode = document.createElement("DIV");
    wrapNode.setAttribute("id", "container");
    //wrapNode.setAttribute("class", "container");
    wrapNode.setAttribute("data-im-control", "repeater");
    bodyNode.appendChild(wrapNode);

    node = document.createElement("DIV");
    node.setAttribute("data-im", "pagebuilder@pageheader@innerHTML");
    node.className = "_im_pb_PageHeader";
    wrapNode.appendChild(node);

    colnode = document.createElement("DIV");
    colnode.className = "row";
    wrapNode.appendChild(colnode);

    //node = document.createElement("DIV");
    //node.className = "col-xs-12 col-sm-9";
    //colnode.appendChild(node);
    for (i = 0; i < firstLevelChildren.length; i++) {
        colnode.appendChild(firstLevelChildren[i]);
    }

    // node = document.createElement("DIV");
    // node.setAttribute("data-im", "pagebuilder@pagenavigation@innerHTML");
    // node.className = "_im_pb_PageSideBar col-xs-12 col-sm-3";
    //colnode.appendChild(node);

    node = document.createElement("DIV");
    node.setAttribute("data-im", "pagebuilder@pagefooter@innerHTML");
    node.className = "_im_pb_PageFooter";
    wrapNode.appendChild(node);

    //node = document.createElement("SCRIPT");
    //node.setAttribute("src", "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js");
    //bodyNode.appendChild(node);
    //node = document.createElement("SCRIPT");
    //node.setAttribute("src", "../lib/js/bootstrap.min.js");
    //bodyNode.appendChild(node);
};

INTERMediatorOnPage.doAfterConstruct = function () {
    var i, j, nodes, aNode, insideNodes, node;
    var fpath, fname, fComp, linkURL, linkClass, linkComp;
    node = document.getElementById("updatedate");
    if (node) {
        var docDT = new Date(document.lastModified);
        node.appendChild(document.createTextNode(docDT.toLocaleDateString()));
    }
    node = document.getElementById("thisyear");
    if (node) {
        var today = new Date();
        node.appendChild(document.createTextNode(today.getFullYear()));
    }
    fpath = location.pathname.split("/");
    fname = fpath[fpath.length - 1];
    fname = (fname.length < 1) ? "index.html" : fname;
    fComp = fname.split(".")[0].split("-")[0];
    nodes = document.getElementsByClassName("navbar-nav");
    for (i = 0; i < nodes.length; i++) {
        insideNodes = nodes[i].getElementsByTagName("LI");
        for (j = 0; j < insideNodes.length; j++) {
            aNode = insideNodes[j].getElementsByTagName("A")[0];
            linkURL = aNode.getAttribute("href");
            linkClass = aNode.getAttribute("class");
            if (linkURL) {
                if (linkURL == fname) {
                    insideNodes[j].setAttribute("class", "active");
                }
                if (linkClass && linkClass == "nav-top") {
                    linkComp = linkURL.split(".")[0].split("-")[0];
                    if (linkComp == fComp) {
                        insideNodes[j].setAttribute("class", "active");
                    }
                }
            }
        }
    }
    nodes = document.getElementsByClassName('row');
    if (nodes) {
        for (i = 0; i < nodes.length; i++) {
            nodes[i].style.display = "block";
        }
    }
};

function showAdvanceBox() {
    var msg = "";
    msg += "<div class='title'>アドバンス・トップエスイー<span class='eyecatch'>2017年度新設</span></div>";
    msg += "<img src='../../images/b_simple_42_0M.png'>";
    msg += "<div class='subtitle'>アドバンス・トップエスイーは，ソフトウェア工学の最先端技術を駆使し，難度の高い先端課題を解決できる人材を育成する教育プログラムです．";
    msg += "トップエスイーで10年余に渡り，技術・理論・ツールを使いこなすスーパーアーキテクトを育成してきた実績に加え，2017年度より新コースとして開講します．</div>";
    msg += "<div class='caption'>アドバンス・トップエスイーでの学習内容</div>";
    msg += "<table>";
    msg += "<tr><th>プロフェッショナルスタディ</th>";
    msg += "<td>開発現場での困難な問題の分析，課題設定，解決策の創出，実行，評価，展開 を，講師が1対1で指導する．博士課程進学希望者には，論文の執筆を指導する．</td></tr>";
    msg += "<tr><th>最先端ソフトウェア工学ゼミ</th>";
    msg += "<td>全受講生と複数の講師が，開発現場の問題解決に役立つ最先端ソフトウェア技術を1年にわたり調査・試行・報告・議論し，最先端の知見を共有する．</td></tr>";
    msg += "<tr><th>最先端の技術を学習できる講義</th>";
    msg += "<td>ソフトウェア工学での必須の知識や最先端の情報を，トップエスイーの講義として提供可能．専門知識の高度化や，自分にとって新しいジャンルへのチャレンジにも最適な講義群を用意した．</td></tr></table>";
    msg += "<ul>";
    msg += "<li>アドバンス・トップエスイーに関する情報は，随時Webサイトでお知らせします．<a href='curriculum.html#advance' target='_blank'>こちら</a>にカリキュラムの説明があります．募集要項は<a href='admission-application1.html' target='_blank'>こちら</a>です．<a href='topse2017.pdf' target='_blank'>2017年度向けのトップエスイープログラムのご案内</a>もご覧ください．</li>";
    msg += "<li>2017年度は4月開講予定で，受講申し込みは2016年12月に開始します．12月16日には<a href='admission-event.html' target='_blank'>講座説明会</a>を東京で開催します．</li>";
    msg += "</ul>";
    showBox(msg);
}

var isShowingBox = false;
var boxClass = "centerbox";

function hideBox() {
    var bodyNode = document.getElementsByTagName("body")[0];
    var boxNode = bodyNode.getElementsByClassName(boxClass);
    if (boxNode.length > 0) {
        boxNode = boxNode[0];
        boxNode.parentNode.removeChild(boxNode);
        isShowingBox = false;
    }
}
function showBox(msg) {
    var bodyNode = document.getElementsByTagName("body")[0];
    var boxNode = bodyNode.getElementsByClassName(boxClass);
    if (boxNode.length > 0) {
        boxNode = boxNode[0];
    } else {
        boxNode = document.createElement("div");
        boxNode.setAttribute("class", boxClass);
        boxNode.innerHTML = "<div class='closebox' onclick='hideBox()'>X</div>" + msg;
        bodyNode.insertBefore(boxNode, bodyNode.childNodes[0]);
        isShowingBox = true;
        adjustBox();
    }
}

window.onresize = function (e) {
    adjustBox();
};

function adjustBox() {
    var bodyNode = document.getElementsByTagName("body")[0];
    var boxNode = bodyNode.getElementsByClassName(boxClass);
    if (boxNode.length > 0) {
        boxNode = boxNode[0];
        var winWidth = window.innerWidth;
        var boxWidth = winWidth - 100;
        boxWidth = Math.max(boxWidth, 200);
        boxWidth = Math.min(boxWidth, 850);
        boxNode.style.top = "180px";
        boxNode.style.left = (winWidth - boxWidth) / 2 + "px";
        boxNode.style.width = boxWidth + "px";
    }
}