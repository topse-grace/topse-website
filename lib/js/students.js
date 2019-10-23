function Student(_name, _organization, _comment, _imgpath, _weight) {
    this.name = _name;
    this.organization = _organization;
    this.comment = _comment;
    this.imgpath = _imgpath;
    this.weight = _weight;
}

var students = [
    new Student(
        "早川芳昭",
        "日本電気株式会社",
        "業務経験上の課題事項についてスタディの場で指導頂きながら解決に取り組むことができ、ゼミでは機械学習に取り組み、後日関連学会への論文投稿・発表を行うなど、未経験の分野で、貴重な経験を積めました.",
        "0294.jpg", 3
    ),
    new Student(
        "大内　一哲",
        "NECソリューションイノベータ",
        "講義と演習では座学に加え、議論・対話を通じて講師と受講生から多くを学び、今でも業務に活かしています。業務との両立は大変でしたが、これを乗り越えたことで「やり遂げる力」と「忙しくても学び続ける力」を養えたと思います.",
    ),
    new Student(
        "岡留　有哉",
        "日立製作所",
        "私は主に形式仕様記述の講義を受講しました. 普段の業務ではなかなか勉強できないことを学ぶことができ, 大変面白かったです. 演習やグループワークも多く, 単なる座学でない授業が多かったことも印象的でした. 多くの技術に触れることで発想の幅も広がったように感じます.",
    ),
    new Student(
        "菅原　茉莉子",
        "富士通研",
        "入社以来の研究分野（ハード開発）からソフトウェアの世界に転向した際に、上司から勧められたことが受講のきっかけでした。独学では得難い、ソフトウェア工学の体系だった理解を得ることができたと思っています.",
        "0146.jpg", 3
    ),
    new Student(
        "天野 和洋",
        "鹿島建設株式会社",
        "トップエスイー修了から少し間が空いていましたが、システム部門から研究部門への社内異動を機に、博士後期課程への進学を決意しました。大学院では、トップエスイー修了制作を発展させながらも業務に直結した研究テーマを設定させていただきました。それによりトップエスイーで得られた知識を活かせただけでなく業務とも両立でき、3年間で学位を取得することができました。現在はその研究をさらに展開して業務に邁進しています．",
    ),
    new Student(
        "飯田　利彦",
        "キャノン株式会社",
        "講義で学んだ理論や技術を駆使して実践演習に取り組むことで、体系的な知識だけでなく、業務の課題に技術を活用する方法と考え方を学ぶことができました．必要な時に活用できる生きた技術が身についたと感じています.",
        "0250.jpg", 1
    ),
];

var mapping = [];
for ( var i = 0 ; i < students.length ; i++ )   {
    for (var j = 0 ; j < students[i].weight ; j++)  {
        mapping.push(i);
    }
}

var number = Math.floor(Math.random() * mapping.length);
if (number < mapping.length) {
    document.getElementById("studentName").textContent = students[mapping[number]].name;
    document.getElementById("studentOrganization").textContent = students[mapping[number]].organization;
    document.getElementById("studentComment").textContent = students[mapping[number]].comment;
    document.getElementById("studentImg").src = "../images/students/" + students[mapping[number]].imgpath;
}


