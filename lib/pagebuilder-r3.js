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
    var i, j, nodes, aNode, insideNodes;
    var fpath, fname, fComp, linkURL, linkClass, linkComp;
    if (document.getElementById("updatedate")) {
        var docDT = new Date(document.lastModified);
        document.getElementById("updatedate").appendChild(document.createTextNode(docDT.toLocaleDateString()));
    }
    if (document.getElementById("thisyear")) {
        var today = new Date();
        document.getElementById("thisyear").appendChild(document.createTextNode(today.getFullYear()));
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
};
