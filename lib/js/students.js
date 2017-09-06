function Student(_name, _organization, _comment, _imgpath, _weight) {
    this.name = _name;
    this.organization = _organization;
    this.comment = _comment;
    this.imgpath = _imgpath;
    this.weight = _weight;
}

var students = [
    new Student(
        "明神 智之",
        "日立製作所",
        "形式手法とアーキテクチャの講義を中心に受講しました。講義ではグループ演習が多く、様々なバックグラウンドを持った他の受講生との議論や講師からのフィードバックを通じて、独学よりも理解を深めることができました。",
        "myojin.jpg", 3
    ),
    new Student(
        "藤澤 克貴",
        "テクマトリックス",
        "講義も興味深いものが多いのですが、特にグループ演習がとても刺激になったと感じています。普段の業務では同年代の他社のエンジニアと議論する場は少ないと思いますので、とても貴重な場で楽しく議論できました。",
        "fujisawa.jpg", 3
    ),
    new Student(
        "国府田 充",
        "NTTコムウェア",
        "トップエスイーのような集団講義による体系的な学習の機会は、社会人にとってはなかなか得難い貴重な時間です。業務と両立するため時間を捻出するのは大変ですが、得られたリターンは非常に大きいものでした。",
        "kokufuda.png", 3
    ),
    new Student(
        "関口 敦二",
        "富士通研究所",
        "トップエスイーの講義で，幅広い知識を，演習を通じて深く学ぶことができました．今後の業務で使える手札が増えました．トップエスイーと本業の両立は大変ですが，その苦労以上のものを得られる１年間だと思います．",
        "sekiguchi.jpg", 3
    ),
    new Student(
        "杉本 駿",
        "キヤノン",
        "開発の上流工程でのソフトウェア品質を高める方法を体系的に学べました．普段触れない理論やツール等も講師の方々の手厚いサポートにより十分対応できましたし，様々な刺激を受けながら大変充実した一年となりました．",
        "sugimoto_600x480.jpg", 3
    ),
    new Student(
        "木村 功作",
        "富士通研究所",
        "とてもエキサイティングな1年間でした．演習に多くの時間が充てられているため，技術や理論の本質を深く理解することができたと実感しております．トップエスイーは実践の場としてとても有益だと思います．",
        "kimura.jpg", 1
    ),
    new Student(
        "若松 和憲",
        "リコーITソリューションズ ",
        "ソフトウェアの設計演習を受講生のグループで実施できるのが良かったです．他の会社のエンジニアと一緒に設計を考える機会はなかなかないと思います．良い刺激を受けることができ，学ぶことも多かったです．",
        "wakamatsu.jpg", 1
    ),
    new Student(
        "山崎 智史",
        "日本電気株式会社",
        "私は第10期生としてトップエスイーに参加し，主に形式手法の講義を受講しました．グループ演習形式の講義が多く，他の受講生の助けを借りながら独習以上に講義内容の理解を深めることができたのが印象的でした．",
        "yamazaki.jpg", 1
    ),
    new Student(
        "古城 仁士",
        "東芝",
        "モデル検査や分散処理，要求工学，テスティング等，広範な領域から選び時間をかけ学べる非常に貴重な機会です．ぜひ積極的に利用し，業務や将来へ活かして下さい．",
        "kojo.png", 1
    ),
    new Student(
        "石井 雄介",
        "富士通",
        "トップエスイーの講師陣や他の受講生との対話と講義を通じて学んだ考え方によって，自分の業務における課題および解決手段を考える際のアプローチの幅が広がったように感じています．",
        "ishii.jpg", 1
    )
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


