class JsonThis {
    apiURl;
    wrapperID;

    constructor(apiURl, wrapperID) {
        this.apiURl    = apiURl;
        this.wrapperID = wrapperID
        this.render()
    }

    json(datas) {
        let string = '[</br>';
        datas.forEach((data) => {
            string += `     {</br>`;
            for (let property in data) {
                string += `        "${property}": ${typeof (data[property]) === "string" ? '"' + data[property] + '"' : data[property]}</br>`;
            }
            string += `     },</br>`;
        })
        string += ']';
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