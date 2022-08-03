class JsonThis {
    apiURl;
    wrapperID;

    constructor(apiURl, wrapperID) {
        this.apiURl    = apiURl;
        this.wrapperID = wrapperID
        this.render()
    }

    json(datas) {
        let string = '<span style="color:#1299DA">[</span><span style="color:#FF8400"></br>';
        datas.forEach((data) => {
            string += `     {</br>`;
            for (let property in data) {
                string += `        "<span style="color:white">${property}</span>": ${typeof (data[property]) === "string" ? '"<span style="color:#56DB3A">' + data[property] + '</span>"' : '<span style="color:#1299DA">' + data[property] + '</span>'}</br>`;
            }
            string += `     }<span style="color:#1299DA">,</span></br>`;
        })
        string += '</span><span style="color:#1299DA">]</span>';
        return string;
    }

    render() {
        $(`${this.wrapperID}`).empty();
        $(`${this.wrapperID}`).append('<pre class="bg-black text-white rounded-3 p-1"></pre>')
        $.get(`${this.apiURl}`, (datas) => {
            $(`${this.wrapperID} > pre`).append(this.json(datas));
        })
    }
}

global.JsonThis = JsonThis;