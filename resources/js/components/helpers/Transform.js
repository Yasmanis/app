export const selectTransform = (val) => {
    let opts = [];
    if(_.size(val) > 0){
        opts = _.map(val,(v,k) => {
            return {value: k, text: v}
        });
    }
    return opts;
}

export const getOptions = async (val) => {
    let opts = [];
    if (val)
        await axios.post('/get-options-select',{...val})
            .then(res => opts = selectTransform(res.data))
    return opts;
}

export const convertToSelectChoice = async (id, allOptions, val, placeholder) => {
    let options = _.map(allOptions.value, opt => {
        if (val && opt.value == val) return { value: opt.value, label: opt.text, selected: true}
        return { value: opt.value, label: opt.text}
    });

    let choice = new Choices(`#${id}`, {
        shouldSort: false,
        choices: [
            { value: 'null', label: placeholder },
        ]
    });
    choice.setChoices(
        options,
        'value',
        'label',
        false
    );
    return choice;
}
