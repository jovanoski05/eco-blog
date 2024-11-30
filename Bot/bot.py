from groq import Groq

client = Groq(
    api_key='Your API Key here')


class Bot:

    def get_report(data):
        req = "Give me a report (without mentioning the date) about the air pollution with the following data: Average pollution - " + str(
            data['avg']) + ' highest pollution at position - ' + str(
                data['highest_position']) + ' with value - ' + str(
                    data['highest']
                ) + ' smallest pollution at position - ' + str(
                    data['smallest_position']) + ' with value - ' + str(
                        data['smallest'])

        chat_completion = client.chat.completions.create(
            messages=[{
                "role": "user",
                "content": req,
            }],
            model="llama3-8b-8192",
        )

        return chat_completion.choices[0].message.content
