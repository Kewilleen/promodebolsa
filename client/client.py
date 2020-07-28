import requests

class Main(object):
	"""docstring for main"""
	def run(self):
		def line(tam=63):
			return '-' * tam

		def header(info):
			print(line())
			print(info.center(63))
			print(line())

		def menu(option):
			header('Menu Principal - PromodeBolso v0.1-Alpha')
			index = 1
			for item in option:
				print(f'{index} - {item}')
				index += 1
			print(line())

		def getResponse(statusId):
			if statusId == 1:
				return "Usuário não pode ser em Texto"
			elif statusId == 2:
				return "O tipo do request não foi encontrado"
			elif statusId == 3:
				return "Este usuário já tem um número sorteado"
			elif statusId == 4:
				return "A probabilidade de números já chegou no limite, não é possível fazer novos cadastros"
			elif statusId == 5:
				return "Sorteado com sucesso!"
			elif statusId == 6:
				return "Id não encontrado!"
			elif statusId == 7:
				return "Usuário encontrado!"
			elif statusId == 8:
				return "ID criado com sucesso!"
			elif statusId == 9:
				return "O usuário já existe"
			elif statusId == 10:
				return "O Id não pode ser maior que 99999"
			elif statusId == 11:
				return "O Id não pode ser menor que 0"
			elif statusId == 12:
				return "O Id não foi sorteado"
			else:
				return "Erro não encontrado! Por favor, entrar em contato com o developer"

		def createUser(userId):
			website = "http://192.168.15.135/promodebolso/"
			request = requests.post(f"{website}api/v1/user", {'id': userId})
			response = request.json()
			if response["status"] == "error":
				time = response["responseTime"]
				print(f"response time {time}")
				print(getResponse(response["statusId"]))
				return True
			else:
				time = response["responseTime"]
				print(f"response time {time}")
				print(getResponse(response["statusId"]))
				return False

		def getSorted(userId):
			website = "http://192.168.15.135/promodebolso/"
			request = requests.get(f"{website}api/v1/{userId}/drawn")
			response = request.json()
			if response["status"] == "error":
				time = response["responseTime"]
				print(f"response time {time}")
				print(getResponse(response["statusId"]))
				return True
			else:
				time = response["responseTime"]
				print(f"response time {time}")
				number = response["number"]
				print(getResponse(response["statusId"]))
				print(f"O número da sorte é {number}")
				return False

		def setSorted(userId):
			website = "http://192.168.15.135/promodebolso/"
			request = requests.get(f"{website}api/v1/{userId}/draw")
			response = request.json()
			if response["status"] == "error":
				time = response["responseTime"]
				print(f"response time {time}")
				print(getResponse(response["statusId"]))
				return True
			else:
				time = response["responseTime"]
				print(f"response time {time}")
				number = response["number"]
				print(getResponse(response["statusId"]))
				print(f"O número da sorte é {number}")
				return False

		menu(['Criar usuário', 'Verificar número sorteado', 'Sortear número para usuário ou criar e sortear'])
		option = input('Selecione uma opção: ')
		if option.isnumeric():
			option = int(option)
			while option <= 3:
				if option == 0:
					break;
				if option == 1:
					print(line())
					print('Para sair, digite 0')
					userId = int(input('Qual o ID para cadastrar? '))
					if userId == 0:
						break
					createUser(userId)
				elif option == 2:
					print(line())
					print('Para sair, digite 0')
					userId = int(input('Qual o Id para verificar o número sorteado? '))
					if userId == 0:
						break
					getSorted(userId)
				elif option == 3:
					print(line())
					print('Para sair, digite 0')
					userId = int(input('Qual o Id para sortear? '))
					if userId == 0:
						break
					setSorted(userId)
				else:
					print('Digite um número inteiro válido.')
		else:
			print('Digite um número inteiro válido.')

if __name__ == '__main__':
    Main().run()