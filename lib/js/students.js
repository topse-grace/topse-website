function Student(_name, _organization, _comment, _imgpath, _weight) {
    this.name = _name;
    this.organization = _organization;
    this.comment = _comment;
    this.imgpath = _imgpath;
    this.weight = _weight;
}

var students = [
    new Student(
        "早川　芳昭 様",
        "日本電気株式会社",
        "業務経験上の課題事項についてスタディの場で指導頂きながら解決に取り組むことができ, ゼミでは機械学習に取り組み, 後日関連学会への論文投稿・発表を行うなど, 未経験の分野で, 貴重な経験を積めました.",
        "0294.jpg", 3
    ),
    new Student(
        "菅原　茉莉子 様",
        "株式会社富士通研究所",
        "入社以来の研究分野（ハード開発）からソフトウェアの世界に転向した際に, 上司から勧められたことが受講のきっかけでした. 独学では得難い, ソフトウェア工学の体系だった理解を得ることができたと思っています.",
        "0146.jpg", 3
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
    document.getElementById("studentName").textContent = students[mapping[number]].name;
    document.getElementById("studentOrganization").textContent = students[mapping[number]].organization;
    document.getElementById("studentComment").textContent = students[mapping[number]].comment;
    document.getElementById("studentImg").src = "../images/students/" + students[mapping[number]].imgpath;
}


