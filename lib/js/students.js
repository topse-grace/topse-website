﻿function Student(_name, _organization, _comment, _imgpath, _weight) {
    this.name = _name;
    this.organization = _organization;
    this.comment = _comment;
    this.imgpath = _imgpath;
    this.weight = _weight;
}

var students = [
    new Student(
      "林 裕之 様",
      "東芝デジタルソリューションズ株式会社",
      "幅広い分野の実践的な講習を通じて，改めて基礎的な知識を学ぶとともに最新技術の知見を得ることができました．また，普段関わることがない他社様の受講生と議論することで，今までにない考え方や価値観に触れ，良い刺激を受けることができました．",
      "林様.jpg", 4
    ),

    new Student(
      "千葉　裕介 様",
      "株式会社デンソー",
      "ソフトウェア工学にとどまらず，クラウドやデータサイエンス等の幅広い技術の講義が開講され，実践的なハンズオンやグループワーク，そして講師や受講生とのディスカッションを通して，自身の技術の裾野を広げたい方にお勧めの研修プログラムです．",
      "千葉様.jpg", 4
    ),

    new Student(
      "宮田　康平 様",
      "株式会社日立製作所",
      "ソフトウェア工学全般に関する知識を体系的に身に着けることができ，実務でも俯瞰的な視点を持てるようになりました．普段交流できない他社の方とも会話でき，この研修は企業内では得難い貴重な経験だと思います．",
      "宮田様.jpg", 4
    ),

    new Student(
      "佐藤　眞輝 様",
      "鹿島建設株式会社",
      "最先端の技術と体系的な知識を学ぶために受講しました．講義では，社内導入を見据えた実践的な演習を体験できると同時に，様々な業界の受講生の意見や考え方を聞くことができ，多角的な視点を養えました．限られた時間の中で，効率的にスキルアップできる一年です．",
      "佐藤様.jpg", 4
    ),

    new Student(
      "定行　裕輔 様",
      "NTTテクノクロス株式会社",
      "前から興味があったデータ分析について，自己学習では得難い体系的な知識を習得できました．異なるバックボーンを持つ人達との演習は業務に生かせる点が多いです．知識の獲得と実践の両面で充実した一年でした．",
      "定行様.jpg", 4
    ),

    new Student(
      "小野村　明宏 様",
      "株式会社NTTデータアイ",
      "最先端のITスキルを学ぶため受講しました．講義で新たに知識を学ぶことに加え，演習では講師や受講生と実践的な課題に対し議論を行い，新たな価値観や考え方を身に付けられました．とても貴重な経験が得れた大切な1年となりました．",
      "小野村様.jpg", 4
    ),

    new Student(
      "加藤　雅也 様",
      "富士通株式会社",
      "AI開発に実践的な取り組みをしたいと考え，トップエスイーを志望しました．講義で必要な知識を習得しつつ，演習で講師の指導のもと実践的な課題に挑戦することで，データ分析のスキルやモデル開発の難しさを学ぶことができました．",
      "加藤様.jpg", 4
    ),

    new Student(
      "古谷　浩平 様",
      "キヤノン株式会社",
      "技術の発展と要求の複雑化に対し，現行知識の限界を感じ受講しました．講義では先端知識に留まらず，他受講生との実践的な演習を通じて知識を技術へと昇華させ，現行業務やさらなる学習意欲へ繋げられると感じます．",
      "古谷様.jpg", 4
    ),

    new Student(
      "鳥野　剛史 様",
      "富士通株式会社",
      "体系的な講義や演習に加えて，講師や各社精鋭と意見交換しながら業務応用の知見を得られることが有意義で，年間通して意欲的に取り組めました．産学連携の広い視野で将来展望への考えを深められるお勧めの一年です．",
      "鳥野様.jpg", 3
    ),

    new Student(
      "黒川　一成 様",
      "キヤノン株式会社",
      "実業務に則したテーマを設定し，課題に取り組むことで，成果をそのまま業務に適用することができました．マンツーマンでのご指導により，深い知識だけでなく，課題に対するアプローチ方法も効率的に身に付けられるのが，本講の良い点だと思います．",
      "黒川様.jpg", 3
    ),

    new Student(
      "岡野　文香 様",
      "株式会社日本総合研究所",
      "複数分野で体系的な知識を身に付けたく，５分野の講義を受講しました．技術の根底にある考え方や分野同士の繋がりを学び，講師や受講生との議論を通じて知識と価値観が磨かれました．ハードでしたが，かけがえのない経験ができた一年です．",
      "岡野様.jpg", 3
    ),

    new Student(
      "関　堅吾 様",
      "株式会社エヌ・ティ・ティ・データ",
      "実業務に根差した課題について，深い知見と見識に基づくご指導と助言を頂きながら取り組むことで，改善策を見出すことができました．第一線の研究者である先生方にマンツーマンでご指導いただけるという，企業内では得難い経験ができ非常に満足しています．",
      "関様.jpg", 3
    ),

    new Student(
      "照屋　絵理 様",
      "株式会社日立製作所",
      "知識に加え実務に役立つスキルも身に付けたく，演習メインの講義を多く受講しました.オンライン講義でしたが，講師や受講生と議論しつつ実践的な課題を解くことで理解が深まりました．企業内では中々経験出来ない学びがありました．",
      "照屋様.jpg", 3
    ),

    new Student(
      "横山　晴樹 様",
      "株式会社富士通研究所",
      "業務と結びつきの強い分野の知識を体系的に学ぶことができたため，全体を俯瞰できるようになりました．講義では，学んだ理論をどのように現場で実践するかについて受講者の皆さんや先生方と共に深く議論できました．",
      "横山様.jpg", 3
    ),

    new Student(
      "宇野　一義 様",
      "キヤノン株式会社",
      "SE技術を広く学ぶためトップエスイーを受講しました．体系的な学習を実践演習で試すことで例えば要求と設計の関係など価値を生み出すプロセスを改めて振り返ることが出来，実務にはない気付きを多く得られました．お勧めの一年です！",
      "宇野様.jpg", 2
    ),

    new Student(
      "藤澤　千尋 様",
      "リコーITソリューションズ株式会社",
      "自分の得意分野を伸ばしたいという思いと，苦手な分野やよくわかっていない分野について体系的に学びたい，と感じたことが受講のきっかけです．様々な分野について学んだことで，自分の技術者としての幅が広がったと感じています．",
      "藤澤様.jpg", 2
    ),

    new Student(
      "工藤　淳真 様",
      "富士通株式会社",
      "ゼミでは様々な機械学習手法の論文を輪読，実験を行い，スタディでは業務上の課題について深く研究に取り組みました．結果として，課題解決のためのアルゴリズムを考案・実装することができ，貴重な経験となりました．",
      "工藤様.jpg", 2
    ),

    new Student(
        "早川　芳昭 様",
        "日本電気株式会社",
        "業務経験上の課題事項についてスタディの場で指導頂きながら解決に取り組むことができ, ゼミでは機械学習に取り組み, 後日関連学会への論文投稿・発表を行うなど, 未経験の分野で, 貴重な経験を積めました.",
        "0294.jpg", 1
    ),
    new Student(
        "菅原　茉莉子 様",
        "株式会社富士通研究所",
        "入社以来の研究分野（ハード開発）からソフトウェアの世界に転向した際に, 上司から勧められたことが受講のきっかけでした. 独学では得難い, ソフトウェア工学の体系だった理解を得ることができたと思っています.",
        "0146.jpg", 1
    ),
    new Student(
        "飯田　利彦 様",
        "キヤノン株式会社",
        "講義で学んだ理論や技術を駆使して実践演習に取り組むことで, 体系的な知識だけでなく, 業務の課題に技術を活用する方法と考え方を学ぶことができました．必要な時に活用できる生きた技術が身についたと感じています.",
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
    // document.getElementById("studentName").textContent = students[mapping[number]].name;
    // document.getElementById("studentOrganization").textContent = students[mapping[number]].organization;
    // document.getElementById("studentComment").textContent = students[mapping[number]].comment;
    // document.getElementById("studentImg").src = "../images/" + students[mapping[number]].imgpath;
}


